<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assets_model extends MY_Model {

  public $table_name = 'assets';

  public function __construct()
  {
    parent::__construct();
  }

  function get_id()
  {
    $rs = $this->db
      ->select('ab.id AS asset_by_id,ab.*,as.*')
      ->where('ab.is_avatar','1')
      ->where('ab.user_id',$this->session->user_id)
      ->join('assets_by as ab','ab.asset_id = as.id')
      ->get($this->table_name.' as as');

    return $rs->row_array();
  }

}
