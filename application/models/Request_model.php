<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Request_model extends MY_Model {

  public $table_name = 'standards';

  public function __construct()
  {
    parent::__construct();
  }

  function get_standard_id($id='')
  {
    return $this->db
      ->select('sd.id,sd.date_create,sd.date_update,sd.category,sd.assets_id,us.email')
      ->like('us.email',$q)
      ->where('sd.user_id',$id)
      ->order_by('sd.id','ASC')
      ->join('users AS us','sd.user_id=us.id')
      ->get('standards AS sd')
      ->result_array();
  }

  function get_standard_all($q='',$status='')
  {
    $this->db
      // ->select('sd.id,sd.user_id,sd.admin_id,sd.approve_status,sd.date_create,sd.date_update,sd.category,sd.assets_id,us.email')
      ->order_by('sd.id','ASC')
      ->join('users AS us','sd.user_id=us.id');

    if ($q)
      $this->db->like('us.email',$q);

    if ($status)
      $this->db->where('sd.approve_status',$status);

    return $this->db->get('standards AS sd')->result_array();
  }

  function get_skill_id($id='')
  {
    return $this->db
      ->select('sk.id,sk.date_create,sk.date_update,sk.assets_id,us.email')
      ->like('us.email',$q)
      ->where('sk.user_id',$id)
      ->order_by('sk.id','ASC')
      ->join('users AS us','sk.user_id=us.id')
      ->get('skills AS sk')
      ->result_array();
  }

  function get_skill_all($q='',$status='')
  {
    $this->db
      // ->select('sk.id,sk.user_id,sk.admin_id,sk.approve_status,sk.date_create,sk.date_update,sk.assets_id,us.email')
      ->order_by('sk.id','ASC')
      ->join('users AS us','sk.user_id=us.id');

    if ($q)
      $this->db->like('us.email',$q);

    if ($status)
      $this->db->where('sk.approve_status',$status);

    return $this->db->get('skills AS sk')->result_array();
  }

  function get_all($q='',$status='')
  {
    $standards = $this->get_standard_all($q,$status);
    $skills = $this->get_skill_all($q,$status);

    $array = array_merge($standards,$skills);
    usort($array, function($a, $b) {
      return ($a['admin_id'] !== '') ? $a['admin_id'] : $a['date_create'] < $b['date_create'];
    });

    return $array;
  }

  function get_code($code='')
  {
    $code = (int) $code;

    $standard = $this->db
      ->where('date_create',$code)
      ->get('standards');

    if ($standard->num_rows() < 1) :
      $skill = $this->db
        ->where('date_create',$code)
        ->get('skills');
      if ($skill->num_rows() > 0) :
        return $skill->row_array();
      endif;
    endif;

    return $standard->row_array();
  }

  function get_date($date)
  {
    $standards = $this->get_standard_all();
    $skills = $this->get_skill_all();

    $events = array_merge($standards,$skills);

    $array = array();
    foreach ($events as $key => $value) :
      if ($value['approve_schedule'] !== '') :
        $approve_schedule = date('Y-m-d',$value['approve_schedule']);
        if ($approve_schedule === $date) :
          $array[] = $value;
        endif;
      endif;
    endforeach;

    return $array;
  }

  function get_future($q='',$status='')
  {
    $standards = $this->get_standard_all($q,$status);
    $skills = $this->get_skill_all($q,$status);

    $events = array_merge($standards,$skills);

    foreach ($events as $key => $value) :
      if ($value['approve_schedule'] === '') :
        unset($events[$key]);
      endif;
    endforeach;

    return $events;
  }

}
