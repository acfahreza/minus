<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Category_Model extends CI_Model
{
    public function getProblem()
    {
        $query = "SELECT *
                  FROM `problem_cat`
                ";
        return $this->db->query($query)->result_array();
    }
}
