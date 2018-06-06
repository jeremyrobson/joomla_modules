<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterControllerProfile extends JControllerForm
{
    public function preview($key = null, $urlVar = null)
    {
        $model = $this->getModel("registrations");

        $view = $this->getView('registrations','html');
        $view->setLayout("import");

        $view->setModel($model, true);
        $view->display();
    }
    
    public function import($key = null, $urlVar = null)
    {
        $app = JFactory::getApplication();
        $input = $app->input;
        $checked = $input->get("cid");
        $model = $this->getModel("registrations");
        $items = $model->getItems();

        //filter by checked items
        if (isset($checked)) {
            $items = array_intersect_key($items, array_flip($checked));
        }

        $db = JFactory::getDbo();

        $count = 0;

        foreach ($items as $item) {
            $profile = new stdClass();
            $profile->id = $item->id;
            $profile->farm_name = $item->name;
            $profile->email = $item->email;
            $profile->contact = $item->name;
            $profile->address = "";
            $profile->city = "";
            $profile->province = "";
            $profile->postal_code = "";
            $profile->telephone = "";
            $profile->website = "";
            $profile->other_crops = "";
            $profile->description = "";
            $profile->facebook = "";
            $profile->profile_tags = "";
            $profile->latitude = $latitude;
            $profile->longitude = $longitude;
            $profile->published = 0;
            $profile->acres_strawberry = 0;
            $profile->acres_raspberry = 0;
            $profile->acres_blueberry = 0;
            $profile->acres_fall_strawberry = 0;
            $profile->acres_fall_raspberry = 0;
            $db->insertObject("#__farm_profile", $profile, $item->id);
            $count++;
        }

        $message = "Import Complete<br>";
        $message = "Imported $count users<br>";
        $status = "success";

        $this->setRedirect(JRoute::_("index.php?option=com_jeregister&view=profiles", false), JText::_($message), $status);
    }
}
