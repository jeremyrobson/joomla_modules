<?php

class JFormRuleTelephone extends JFormRule
{
	protected $regex = "^1?[ -]?(\d{3}|\(\d{3}\))([ -])?\d{3}([ -])?\d{4}(,?\s?([EXText]{1,3}[\s.]?)?\s?\d{1,5})?$";
}

