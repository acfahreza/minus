<!DOCTYPE html>
<html>
<head>
	<base href="<?php echo base_url() ?>">
	<title>Cetak Laporan</title>
	<link href="http://localhost/app-ci3/assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body >
	<div class="container">
	<center style="background-color: #dafff2;
    margin: 0px;
    margin-left: -22px;
    margin-right: -23px;
    padding-bottom: 1px;">
	<br>
		<h4>SISTEM INFORMASI PELAPORAN PENANGANAN PELAYANAN GANGGUAN</h4>
		<p>REPORT DIVISI ITS</p>
	
	</center>
	<?php 
	//$rs = $report->row();
	$t1 = time($date1);
	$t2 = time($date2);
	 ?>

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				
				<tr>
					<th>Mulai Tgl</th>
					<th>:</th>
					<td><?= date('d/m/Y',strtotime($date1)); ?></td>
					<th>Sampai Tgl</th>
					<th>:</th>
					<!-- <td>Rp. <?php //echo number_format($rs->total_harga); ?></td> -->
					<td><?= date('d/m/Y',strtotime($date2)); ?></td>
				</tr>
			</table>
		</div>
		<div class="col-md-12">
			<table class="table table-bordered" style="margin-bottom: 10px" >
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama</th>
						<th>Nik</th>
						<th>Category</th>
						<th>Type</th>
						<th>Description</th>
						<th>Status</th>
						<th>Respond</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					<?php
			
					$sql = $this->db->query("SELECT * FROM problem_req WHERE date_problem BETWEEN '$date1' AND '$date2' order by date_problem ASC");
					$no = 1;
				
					foreach ($sql->result() as $row) {
						if($row->respont == 'Success'){
				
						if($row->type == 1){
							$type = 'Kerusakan';
						}else{
							$type = 'Pengadaan';
						}
						if($row->category_id == 1){
							$category = 'Network';
							}else if($row->category_id == 2){
							$category = 'Support';
							}else if($row->category_id == 3){
							$category = 'Hardware';
							}else{
							$category = 'Software';
							}
					
					 ?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $row->name; ?></td>
						<td><?php echo $row->nik; ?></td>
						<td><?php echo $category; ?></td>
						<td><?php echo $type; ?></td>
						<td><?php echo $row->description; ?></td>
						<td><?php echo $row->kind; ?></td>
						
						<td><?php echo $row->respont; ?></td>
						<td>
						
						<?php echo date('d/m/Y',strtotime($row->date_problem)); ?>
						 </td>
					</tr>
					<?php }
				}
				 ?>
					<tr>
						<!-- <td colspan="6">Total</td>
						<td>Rp. <?php
						$sel= $this->db->query("SELECT * , count(id) as total FROM problem_req  where respont='Success'");
						$query = $sel->result();
						
						?></td> -->
					</tr>
					<!-- <tr>
						<td colspan="6"><b>Diskon Keseluruhan (10%)</b></td>
						<td>
							Rp.
				
						</td>
					</tr>
					<tr>
						<td colspan="6"><b>Total Bayar</b></td>
						<td>Rp. </td>
					</tr> -->
				</tbody>
			</table>

			<div style="text-align: right;">
				<p><?php echo date('d/m/Y') ?></p>
				<br><br><br><br><br>
				<p>Staff ITS</p>
			</div>
		</div>
	</div>
</div>


<!-- <script src='assets/jspdf.debug.js'></script>
	<script src='assets/html2pdf.js'></script>
	<script>
		var pdf = new jsPDF('l', 'pt', 'A4');
		var canvas = pdf.canvas;
		var width = 1200;
		//canvas.width=8.5*72;
		document.body.style.width=width + "px";

		html2canvas(document.body, {
		    canvas:canvas,
		    onrendered: function(canvas) {
		        var iframe = document.createElement('iframe');
		        iframe.setAttribute('style', 'position:absolute;top:0;right:0;height:100%; width:100%');
		        document.body.appendChild(iframe);
		        iframe.src = pdf.output('datauristring');

		       //var div = document.createElement('pre');
		       //div.innerText=pdf.output();
		       //document.body.appendChild(div);
		    }
		});
     </script> -->


</body>
</html>