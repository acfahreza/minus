<?php
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index(){
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'HELPDESK REPORT',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'LIST REPORT ',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'NO',1,0);
        $pdf->Cell(40,6,'NAME',1,0);
        $pdf->Cell(27,6,'CATEGORY',1,0);
        $pdf->Cell(50,6,'DESCRIPTION',1,1);
        $pdf->SetFont('Arial','',10);
        $req = $this->db->get('problem_req')->result();
        $no=1;
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
            
            $pdf->Cell(20,6,$no++,1,0);
            $pdf->Cell(40,6,$row->name,1,0);
            $pdf->Cell(27,6,$category,1,0);
            $pdf->Cell(50,6,$row->description,1,1); 
        }
       
        $pdf->Output();
    }
}