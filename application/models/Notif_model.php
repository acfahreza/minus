<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Notif_model extends CI_Model
{
    public function getDataReqPen()
    {
        $this->db->count_all_results();
        $this->db->select('id');
        $st= "respont ='' ";
        $this->db->where($st, NULL, FALSE); 
        $query = $this->db->get('problem_req');
        if($query->num_rows()>0) {
          return $query->num_rows();
        }else{
          return 0;
        }
    }
}
