<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    
      
                <label for="name" class="col-sm-2 col-form-label">
                <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1></label>
                
                
             
    <div class="row">
        <div class="col-lg">
            
            <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <div class="card shadow mb-4">
            <form action="<?=base_url('request/cetak_laporan')?>" method="post" accept-charset="utf-8" class="form mt-3 mb-3 ml-3 mr-3" target="_blank">
            <div class="card-header py-3">
              <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary"> &nbsp; Date Report : <br>
            <input type="date" class="form-control" style="display: initial; width: auto;" name="datee" id="datee" value="<?php echo date('Y-m-d'); ?>">
            -- <input type="date" class="form-control" style="display: initial; width: auto;" name="dateee" id="dateee" value="<?php echo date('Y-m-d'); ?>">
            </h6>
          
                
           <button type="submit" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</button>
            <form>
        </div>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Type</th>
                            <th scope="col">Description</th>
                            <th scope="col">Date Problem</th>
                            <th scope="col">Progress</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($problem as $sm) : ?>
                    <?php if ($sm['type'] == 1) {
                            $type ='Kerusakan';
                            }else {
                            $type ='Pengadaan Barang';
                            }
                            ?>
                        <tr>
                        <td><h5 style="font-size:12px;"><?= $sm['name']; ?></h5></td>
                        <?php foreach ($category as $sy) : ?>
                                        <?php if($sm['category_id']==$sy['id']){?>
                                <td><h5 style="font-size:12px;">  <?= $sy['category']; ?></h5></td>
                                        <?php  }?>
                                        <?php endforeach; ?>
                                        <td><h5 style="font-size:12px;"><?= substr($type,0,9); ?></h5></td>
                            <td><h5 style="font-size:12px;"><?= substr($sm['description'],0,10).' ...'; ?></h5></td>
                            <td><h5 style="font-size:12px;"><?= substr($sm['date_problem'],0,11); ?></h5></td>
                            <td><h5 style="font-size:12px;"><?= $sm['respont']; ?></h5></td>
                            <td>
                                <a href="<?=base_url('request/detail/').$sm['id'];?>" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="<?=base_url('request/delete/').$sm['id'];?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Are You Sure ?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
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
