<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Standard_model extends MY_Model {

  public $table_name = 'standards';

  public function __construct()
  {
    parent::__construct();
  }

  function get_id($id='')
  {
  }

}
