<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Request extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('Pdf');
    }

    public function index()
    {
        
        $data['title'] = 'Request';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['list'] = $this->db->get('problem_req')->result_array();
        $st= "detect='0'";
        $x= $this->db->select('*')->from('problem_req')
                        ->where($st, NULL, FALSE)
                        ->get();
         $data['rowcount'] = $x->num_rows(); 
         
        $data['category'] = $this->db->get('pro')->result_array();
        $category = $data['category'];
        $data['problem'] = $this->db->get('problem_req')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('request/index', $data);
        $this->load->view('templates/footer');
      
    }

    public function detail($req_id)
    {
    $data['title'] = 'Detail';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['request'] = $this->db->get_where('problem_req', ['id' => $req_id])->row_array();
    $data['list'] = $this->db->get('problem_req')->result_array();
    $data['jenis'] = $this->db->get('barang')->result_array();

    $this->form_validation->set_rules('respont', 'respont', 'required');
    $this->form_validation->set_rules('kind', 'kind', 'required');
    if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('request/detail', $data);
        $this->load->view('templates/footer');
        } else {
           $respont = $this->input->post('respont');
           $kind = $this->input->post('kind');
           $type = $this->input->post('type');
           $s1 = $this->input->post('recomend1');
           $s2 = $this->input->post('recomend2');
           $s3 = 'Sedang Dalam Proses Pengerjaan';
           
         
           if($respont == 'On Progress' OR $respont == 'Success' ){
           if($respont == 'Success'){
               $ok ='1';
           }else{
               $ok ='0';
               } 

            
             
                if($kind =='Ringan' && $type=='Kerusakan'){
                   $recom = 'Pengecekan';
                }elseif($kind =='Sedang' && $type=='Kerusakan'){
                    $recom = 'Perbaikan';
                }elseif($kind =='Berat' && $type=='Kerusakan'){
                    $recom = 'Penggantian Ulang';
               }else{
                $recom =$s2.'
                '.'Recommend : '.$s1;
               }

            }
            $s4 = $recom.' Success';
           $id = $this->input->post('id');
            $this->db->set('respont', $respont);
            //$this->db->set('kind', $kind);
            $this->db->set('recomend', $recom);
            if($respont =='Pending'){
            $this->db->set('recomend', $s3);
            }elseif($respont =='Success'){
            $this->db->set('recomend', $s4);
            }
            $this->db->set('detect', $ok);
            $this->db->where('id', $id);
            $this->db->update('problem_req');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your respont has been updated!</div>');
            redirect('request');
                }
    }
    

    public function delete($id=null)
    {
        $where = array ('id' => $id); 
        $this->db->delete('problem_req', $where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success Delete!</div>');
        redirect ('request');
    
    }

    public function report(){
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'SISTEM INFORMASI PELAPORAN PENANGANAN PELAYANAN GANGGUAN',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'LIST REPORT ',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'NO',1,0);
        $pdf->Cell(20,6,'NAME',1,0);
        $pdf->Cell(20,6,'NIK',1,0);
        $pdf->Cell(25,6,'CATEGORY',1,0);
        $pdf->Cell(25,6,'TYPE',1,0);
        $pdf->Cell(50,6,'DESCRIPTION',1,0);
        $pdf->Cell(20,6,'DATE',1,0);
        $pdf->Cell(25,6,'RESPONT',1,1);
        $pdf->SetFont('Arial','',10);

        //$date= $this->input->post('date');
        $st= "respont ='Success' ";
        $this->db->where($st, NULL, FALSE); 
        $req = $this->db->get('problem_req')->result();
        $no=1;
        // $o = $this->db->get('user')->result();
        // foreach ($o as $user){
            
        // }
        // if($user['divisi']=='General Affair (GA)'){
        //     $b='GA00';
        // }elseif($user['divisi']=='Human Resource Development (HRD)'){
        //     $b='HRD00';
        // }elseif($user['divisi']=='Accounting & Finance'){
        //     $b='AF00';
        // }elseif($user['divisi']=='FTTB Corporate'){
        //     $b='FTC00';
        // }elseif($user['divisi']=='FTTH IKR'){
        //     $b='FTI00';
        // }elseif($user['divisi']=='Special Project Event'){
        //     $b='SPE00';
        // }elseif($user['divisi']=='Provisioning Access Point'){
        //     $b='PAP00';
        // }elseif($user['divisi']=='Field Operation (FOP)'){
        //     $b='FOP00';
        // }elseif($user['divisi']=='Networks Operation Center (NOC)'){
        //     $b='NOC00';
        // }else{
        //     $b='ITS00';
        // }
        foreach ($req as $row){
                  if($row->category_id == 1){
                    $category = 'Network';
                    }else if($row->category_id == 2){
                    $category = 'Support';
                    }else if($row->category_id == 3){
                    $category = 'Hardware';
                    }else{
                    $category = 'Software';
                    }
            
            if($row->type == 1){
                $type = 'Kerusakan';
            }else{
                $type = 'Pengadaan';
            }
            $b = 'NOC00';
            $pdf->Cell(10,6,$no++,1,0);
            $pdf->Cell(20,6,$row->name,1,0);
            $pdf->Cell(20,6,$row->nik,1,0);
            $pdf->Cell(25,6,$category,1,0);
            $pdf->Cell(25,6,$type,1,0);
            $pdf->Cell(50,6,$row->description,1,0); 
            $pdf->Cell(20,6,substr($row->date_problem,0,11),1,0); 
            $pdf->Cell(25,6,$row->respont,1,1); 
            }
       
        $pdf->Output();
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

    


}