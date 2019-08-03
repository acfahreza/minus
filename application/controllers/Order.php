<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        
        $data['title'] = 'Order Me';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['list'] = $this->db->get('problem_req')->result_array();

        $st= "detect='0'";
        $x= $this->db->select('*')->from('problem_req')
                        ->where($st, NULL, FALSE)
                        ->get();
         $data['rowcount'] = $x->num_rows(); 

        $data['category'] = $this->db->get('pro')->result_array();

        $this->form_validation->set_rules('category_id', 'Category', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('divisi', 'Divisi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('order/index', $data);
            $this->load->view('templates/footer');
        } else {
            $kendaraan = $this->input->post('description');
            if(empty($kendaraan)){
            $kendaraan = ['Kosong'];
            }
            //Hardware
                    if (in_array('Kerusakan pada router/switch', $kendaraan)){
                        $kind='Berat';
                    }else if (in_array('Kerusakan pada AP Wifi', $kendaraan)){
                        $kind='Berat';
                    }else if (in_array('Kerusakan pada modem internet', $kendaraan)){
                        $kind='Berat';
            //Software
                    }else if (in_array('pc/laptop terkena virus/malware', $kendaraan)){
                        $kind='Berat';
            //Network
                    }else if (in_array('Konfigurasi Server dengan Client', $kendaraan)){
                        $kind='Berat';
            //S.Hardware
                    }else if (in_array('Kerusakan pada scanner', $kendaraan)){
                        $kind='Sedang';
                    }else if (in_array('Kerusakan pada printer yang tidak dapat mencetak', $kendaraan)){
                        $kind='Sedang';
            //S.Software    
                    }else if (in_array('Tidak Dapat Membuka Aplikasi Pendukung Kerja', $kendaraan)){
                        $kind='Sedang';
                    }else if (in_array('Tidak Dapat Membuka Aplikasi Database', $kendaraan)){
                        $kind='Sedang';
            //S.Network
                    }else if (in_array('Kerusakan / terputusnya Kabel pada jaringan', $kendaraan)){
                        $kind='Sedang';
                    }else if (in_array('kerusakan pada connector jaringan', $kendaraan)){
                        $kind='Sedang';
                    }else if (in_array('Kosong', $kendaraan)){
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your Order has been Fail!</div>');
                        redirect('order/list');
                    }else{
                    $kind='Ringan';
                    }

            $data = [
                'name' => $this->input->post('name'),
                'nik' => $this->input->post('nik'),
                'category_id' => $this->input->post('category_id'),
                'type' => $this->input->post('type'),
                'description' => implode(',', $this->input->post('description')),
                'date_problem' => date('Y-m-d'),
                'time' => date('h:i:s'),
                'kind' => $kind,
                'respont'=>'Order',
                'detect' => '0'
            ];
            $this->db->insert('problem_req', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Order has been Post!</div>');
            redirect('order/list');
        }
    }

    public function list()
    {
            $data['title'] = 'Order List';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
            $data['list'] = $this->db->get('problem_req')->result_array();
            $data['urole'] = $this->db->get('user_role')->result_array();
            $data['problem'] = $this->db->get('pro')->result_array();
           
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('order/list', $data);
                $this->load->view('templates/footer');
          
    }

    public function turnoff($id)
    {
        $this->db->set('detect', '2');
        $this->db->where('id', $id);
        $this->db->update('problem_req');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Notif success !</div>');
        redirect('order/list');
    }

    

}