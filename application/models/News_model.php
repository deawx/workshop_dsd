<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends MY_Model {

  public $table_name = 'news';

  public function __construct()
  {
    parent::__construct();
  }

  function get_all($q='')
  {
    $news = $this->db
      ->like('title',$q)
      ->order_by('id','ASC')
      ->get($this->table_name);

    return $news->result_array();
  }

  function get_id($id='')
  {
    $new = $this->db
      ->where('id',$id)
      ->get($this->table_name);

    return $new->row_array();
  }

  function pinned($id)
  {
    $new = $this->db
      ->select('pinned')
      ->where('id',$id)
      ->get($this->table_name);

    if ($new->num_rows() < 1)
      return FALSE;

    $new = $new->row_array();
    $pinned = ($new['pinned'] > 0) ? '0' : '1';

    $this->db
      ->set('pinned',$pinned)
      ->where('id',$id)
      ->update($this->table_name);

    return $this->db->affected_rows();
  }

}
