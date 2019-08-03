<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['list'] = $this->db->get('problem_req')->result_array();
        
        $st= "detect='0'";
        $x= $this->db->select('*')->from('problem_req')
                        ->where($st, NULL, FALSE)
                        ->get();
         $data['rowcount'] = $x->num_rows(); 


        $data['readoff'] = $this->Admin_model->getDataUserOff();
        $data['readon'] = $this->Admin_model->getDataUserOn();
        $data['reqsuc'] = $this->Admin_model->getDataReqSuc();
        $data['reqpen'] = $this->Admin_model->getDataReqPen();

        $data['category'] = $this->db->get('pro')->result_array();
        $category = $data['category'];
        $data['problem'] = $this->db->get('problem_req')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_laporan()
	{
        $data['date1']= $this->input->post('datee');
        $data['date2']= $this->input->post('dateee');
        $st= "respont ='Success' ";
        $this->db->where($st, NULL, FALSE);
        $data['report'] = $this->db->get('problem_req')->result();

        
		$this->load->view('request/cetak_laporan',$data);
    }


    public function role()
    {
        $data['title'] = 'Setting';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $data['list'] = $this->db->get('problem_req')->result_array();

        $st= "detect='0'";
        $x= $this->db->select('*')->from('problem_req')
                        ->where($st, NULL, FALSE)
                        ->get();
         $data['rowcount'] = $x->num_rows(); 

        $this->form_validation->set_rules('role', 'Menu', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
         } else {
                $this->db->insert('user_role', ['role' => $this->input->post('role')]);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
                redirect('admin/role');
            }
    }


           
    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        $data['list'] = $this->db->get('problem_req')->result_array();
        
        $st= "detect='0'";
        $x= $this->db->select('*')->from('problem_req')
                        ->where($st, NULL, FALSE)
                        ->get();
         $data['rowcount'] = $x->num_rows(); 

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }


    public function categoryadd(){
        $this->form_validation->set_rules('category', 'Category', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Category is warning  !</div>');
            redirect('admin/role');
        } else {
                 $this->form_validation->set_rules('category', 'Category', 'required');
                $this->db->insert('pro', ['category' => $this->input->post('category')]);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Category added!</div>');
                redirect('admin/role');
        }

    }

    public function categoryedit(){
        $this->form_validation->set_rules('category', 'Category', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Category is warning  !</div>');
            redirect('admin/role');
        } else {
                $category = $this->input->post('category');
                $id       = $this->input->post('id');
                $this->db->set('category', $category);
                $this->db->where('id', $id);
                $this->db->update('pro');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Category Success!</div>');
                redirect('admin/role');
        }

    }
    public function categorydel($id){

            $where = array ('id' => $id); 
            $this->db->delete('pro', $where);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Succes Delete!</div>');
            redirect('admin/role');
        
        

    }


}
