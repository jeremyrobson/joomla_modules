<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');

class JFormFieldSectionheader extends JFormField {
	protected $type = "sectionheader";

	public function getLabel() {
		return "";
	}

	public function getInput() {
		$size = $this->size;
		return "<h$size>" . $this->description . "</h$size>";
	}
}
