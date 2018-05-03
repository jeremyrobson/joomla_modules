<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');

class JFormFieldProfileTags extends JFormField {

    protected $type = 'ProfileTags';

    public function getInput() {
        $selected = explode(",", $this->form->getValue("tags"));
        $options = array();

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('*')->from('`#__tags` AS a')->where("parent_id > 0");
        $rows = $db->setQuery($query)->loadObjectlist();
        foreach ($rows as $row) {
            $options[] = JHtml::_('select.option', $row->title, $row->title, 'value', 'text', false);
        }

        return JHTML::_('select.genericlist', $options, $name=$this->name, "multiple", $key='value', $text='text', $selected);
    }
}