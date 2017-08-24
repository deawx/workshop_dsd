<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('age_calculate'))
{
  /*
  /
  @timestamp $birthdate
  */
  function age_calculate($birthdate,$todate=NULL)
  {
    $birthdate = is_numeric($birthdate) ? $birthdate : NOW();
    $todate = is_numeric($todate) ? $todate : NOW();

    $birthdate = date('Y-m-d',$birthdate);
    $todate = date('Y-m-d',$todate);

    return date_diff(date_create($birthdate),date_create($todate))->y;
  }
}
