<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    
      
                <label for="name" class="col-sm-2 col-form-label">
                <h1 class="h3 mb-2 text-gray-800"></h1></label>
                
                
             
    <div class="row">
        <div class="col-lg">
            
            <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <div class="card shadow mb-4">

            <div class="card-header py-3">
              <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <?php echo anchor(site_url('barang/create'),'Create', 'class="btn btn-primary"'); ?>
            <h6 class="m-0 font-weight-bold text-primary"> &nbsp; </h6>
            <!-- <a href="<?= base_url('request/report')?>" target="blank" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Image</th>
                    <th>Action</th>
            </tr><?php
            foreach ($barang_data as $barang)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $barang->kode_barang ?></td>
            <td><?php echo $barang->nama_barang ?></td>
            <td><img src="image/barang/<?php echo $barang->foto_barang ?>" width='70px' height='45px'></td>
            <td style="text-align:center" width="200px">
            <a href="<?=base_url('barang/update/').$barang->id_barang;?>" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
            <a href="<?=base_url('barang/delete/').$barang->id_barang;?>" class="btn btn-danger btn-circle btn-sm" onclick="javasciprt: return confirm('Are You Sure ?')"><i class="fas fa-trash"></i></a>  
            </td>
        </tr>
                <?php
            }
            ?>
        </table>
                 </div>
             </div>

            </div>
         </div>
        </div>
    </div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
