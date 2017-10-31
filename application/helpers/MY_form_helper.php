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

if ( ! function_exists('dropdown_title'))
{
	function dropdown_title()
	{
		$title = array(''=>'คำนำหน้าชื่อ',
			'นาย'=>'นาย','นาง'=>'นาง','นางสาว'=>'นางสาว','หม่อมหลวง'=>'หม่อมหลวง','ว่าที่ร้อยตรี'=>'ว่าที่ร้อยตรี',
			'พลเอก'=>'พลเอก','พลตรี'=>'พลตรี','พันโท'=>'พันโท','ร้อยเอก'=>'ร้อยเอก','ร้อยตรี'=>'ร้อยตรี',
			'จ่าสิบโท'=>'จ่าสิบโท','สิบเอก'=>'สิบเอก','สิบตรี'=>'สิบตรี','พลเรือเอก'=>'พลเรือเอก','พลเรือตรี'=>'พลเรือตรี',
			'นาวาโท'=>'นาวาโท','เรือเอก'=>'เรือเอก','เรือตรี'=>'เรือตรี','พันจ่าโท'=>'พันจ่าโท','จ่าเอก'=>'จ่าเอก',
			'จ่าตรี'=>'จ่าตรี','พลอากาศเอก'=>'พลอากาศเอก','พลอากาศตรี'=>'พลอากาศตรี','นาวาอากาศโท'=>'นาวาอากาศโท','เรืออากาศเอก'=>'เรืออากาศเอก',
			'เรืออากาศตรี'=>'เรืออากาศตรี','พันจ่าอากาศโท'=>'พันจ่าอากาศโท','จ่าอากาศเอก'=>'จ่าอากาศเอก','จ่าอากาศตรี'=>'จ่าอากาศตรี','พลตำรวจเอก'=>'พลตำรวจเอก',
			'พลตำรวจตรี'=>'พลตำรวจตรี','พันตำรวจโท'=>'พันตำรวจโท','ร้อยตำรวจเอก'=>'ร้อยตำรวจเอก','ร้อยตำรวจตรี'=>'ร้อยตำรวจตรี','จ่าสิบตำรวจ'=>'จ่าสิบตำรวจ',
			'สิบตำรวจโท'=>'สิบตำรวจโท','พลตำรวจ'=>'พลตำรวจ');

		return $title;
	}
}

if ( ! function_exists('dropdown_month'))
{
	function dropdown_month($key='')
	{
		$months = array('' => 'เดือน',
			'1' => 'มกราคม','2' => 'กุมภาพันธ์',
			'3' => 'มีนาคม','4' => 'เมษายน',
			'5' => 'พฤษภาคม','6' => 'มิถุนายน',
			'7' => 'กรกฎาคม','8' => 'สิงหาคม',
			'9' => 'กันยายน','10' => 'ตุลาคม',
			'11' => 'พฤศจิกายน','12' => 'ธันวาคม'
		);

		$key = ltrim($key,'0');

		if (intval($key) > 0)
			return $months[$key];

		return $months;
	}
}
