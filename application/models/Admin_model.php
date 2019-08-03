<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getDataUserOff()
    {
        $this->db->count_all_results();
        $this->db->select('id');
        $st= "is_active='0'";
        $this->db->where($st, NULL, FALSE); 
        $query = $this->db->get('user');
        if($query->num_rows()>0){
          return $query->num_rows();
        }else{
          return 0;
        }
    }

    public function getDataUserOn()
    {
        $this->db->count_all_results();
        $this->db->select('id');
        $st= "is_active='1'";
        $this->db->where($st, NULL, FALSE); 
        $query = $this->db->get('user');
        if($query->num_rows()>0) {
          return $query->num_rows();
        }else{
          return 0;
        }
    }
    
    public function getDataReqSuc()
    {
        $this->db->count_all_results();
        $this->db->select('id');
        $st= "respont ='Success' ";
        //$sd= "date_problem ='Success' ";
        $this->db->where($st, NULL, FALSE); 
        //$this->db->or_where($sd, NULL, FALSE); 
        $query = $this->db->get('problem_req');
        if($query->num_rows()>0) {
          return $query->num_rows();
        }else{
          return 0;
        }
    }

    public function getDataReqPen()
    {
        $this->db->count_all_results();
        $this->db->select('id');
        $st= "respont !='Success' ";
        $this->db->where($st, NULL, FALSE); 
        $query = $this->db->get('problem_req');
        if($query->num_rows()>0) {
          return $query->num_rows();
        }else{
          return 0;
        }
    }
}
