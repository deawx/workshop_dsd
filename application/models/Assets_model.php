<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assets_model extends MY_Model {

  public $table_name = 'assets';

  public function __construct()
  {
    parent::__construct();
  }

  function get_id()
  {
    $asset = $this->db
      ->select('ab.id AS asset_by_id,ab.*,as.*')
      ->where('ab.user_id',$this->session->user_id)
      ->where('ab.is_avatar','1')
      ->limit('1')
      ->join('assets_by as ab','ab.asset_id = as.id')
      ->get($this->table_name.' as as');

    return $asset->row_array();
  }

  function get_all()
  {
    $assets = $this->db
      ->select('as.*')
      ->where('ab.user_id',$this->session->user_id)
      ->where('ab.is_avatar','0')
      ->join('assets_by as ab','ab.asset_id = as.id')
      ->get($this->table_name.' as as');

    return $assets->result_array();
  }

  function get_attachment($record_id='')
  {
    $assets = $this->db
      ->select('id,file_name,image_size_str')
      ->where_in('id',$record_id)
      ->get($this->table_name);

    return $assets->result_array();
  }

  function delete_attachment($asset_id='')
  {
    $exist = $this->db
      ->select('file_name')
      ->where('id',$asset_id)
      ->get($this->table_name);

    if ($exist->num_rows()) :
      $file = $exist->row_array();
      $file_path = FCPATH.'uploads/attachments/'.$file['file_name'];
      if (unlink($file_path)) :
        $as_del = $this->db
          ->where('id',$asset_id)
          ->delete($this->table_name);
        $ab_del = $this->db
          ->where('asset_id',$asset_id)
          ->delete('assets_by');
        return TRUE;
      endif;
    endif;

    return FALSE;
  }

}
