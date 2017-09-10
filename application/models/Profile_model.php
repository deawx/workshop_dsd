<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends MY_Model {

  public $table_name = 'users';

  public function __construct()
  {
    parent::__construct();
  }

  function get_users($q='',$limit='',$offset='')
  {
    return $this->db
      ->like('us.email',$q)
      ->where('ug.group_id','2')
      ->order_by('us.id','DESC')
      ->join('users_groups AS ug','ug.user_id=us.id')
      ->limit($limit)
      ->offset($offset)
      ->get('users AS us')
      ->result_array();
  }

}
