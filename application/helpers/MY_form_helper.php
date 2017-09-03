<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('form_number'))
{
	function form_number($data = '', $value = '', $extra = '')
	{
		$defaults = array(
			'type' => 'number',
			'name' => is_array($data) ? '' : $data,
			'value' => $value
		);
		return '<input '._parse_form_attributes($data, $defaults)._attributes_to_string($extra)." />\n";
	}
}

if ( ! function_exists('form_email'))
{
	function form_email($data = '', $value = '', $extra = '')
	{
		$defaults = array(
			'type' => 'email',
			'name' => is_array($data) ? '' : $data,
			'value' => $value
		);
		return '<input '._parse_form_attributes($data, $defaults)._attributes_to_string($extra)." />\n";
	}
}

if ( ! function_exists('dropdown_month'))
{
	function dropdown_month()
	{
		return array('' => 'เดือน',
			'1' => 'มกราคม','2' => 'กุมภาพันธ์',
			'3' => 'มีนาคม','4' => 'เมษายน',
			'5' => 'พฤษภาคม','6' => 'มิถุนายน',
			'7' => 'กรกฎาคม','8' => 'สิงหาคม',
			'9' => 'กันยายน','10' => 'ตุลาคม',
			'11' => 'พฤศจิกายน','12' => 'ธันวาคม'
		);
	}
}
