<?php

defined('_JEXEC') or die('Restricted access');

abstract class RegistrationHelper
{
	public static function send_email($params) {
        $mailer = JFactory::getMailer();
        $mailer->isHTML(true);
        $mailer->setSender("info@ontarioberries.com");
        $mailer->addRecipient($params["email"]);
        $mailer->addBcc("jeremy@dragonflyit.ca");
        $mailer->addBcc("info@ontarioberries.com");
        $mailer->setSubject("Thank you for submitting you Ontario Berry Growser Declaration for the 2018 season!");
        
        require_once(JPATH_ROOT .'/components/com_jeregister/models/summary.php');
        require_once(JPATH_ROOT .'/components/com_jeregister/views/summary/view.html.php');
        
        $model = JModelLegacy::getInstance("Summary", "JeregisterModel");

        $view = new JeRegisterViewSummary();
        $view->item = $model->getItem();

		try {
            ob_start();
            $view->setLayout("summary");
            $view->display();
            $body = ob_get_clean();
            $mailer->setBody($body);
			$mailer->send();
		}
		catch (Exception $e){
            echo $e->getMessage(); die;
			JLog::add('Caught exception: ' . $e->getMessage(), JLog::Error, 'jerror');
		}
    }

    public static function getRegistrationStatus($user_id) {
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query
			->select(array("id", "user_id", "registration_id", "json", "date", "status"))
			->from("#__transaction")
			->where("user_id = " . $user_id)
			->order("date DESC");
		$db->setQuery($query);
		$transaction = $db->loadAssoc();

        //check if year has passed since previous date
        $date1 = date_create($transaction["date"]);
        $date2 = date_create("now");
        $interval = date_diff($date1, $date2);
        
        $years = (int) $interval->format("%y");

		if ($years > 0) {
            return "COM_JEREGISTER_STATUS_EXPIRED";
        }
        else {
            return "COM_JEREGISTER_STATUS_CURRENT";
        }
    }

    public static function createOrUpdateProfile($user_id) {
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query
			->select(array("*"))
			->from("#__registration")
			->where("user_id = " . $user_id);
		$db->setQuery($query);
        $registration = $db->loadObject();
        $json = json_decode($registration->json);

        $profile = JModelLegacy::getInstance("farmprofile", "JeregisterModel");

        /*
        echo "<pre>"; print_r($json); die;

        $profile->id = $user_id;
        $profile->farm_name = $registration["main"]["farm_name"];
        return $profile->save();
        */

        return true;
    }
}