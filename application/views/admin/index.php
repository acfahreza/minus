<!-- Begin Page Content -->
<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
            <hr/>
            <!-- <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>
  <!-- Content Row -->
  <div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">User Pending</div>
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $readoff; ?></div>
            </div>
            <div class="col">
              <div class="progress progress-sm mr-2">
                <div class="progress-bar bg-primary" role="progressbar" style="width: <?= $readoff; ?>0%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-user fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">User Active</div>
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $readon; ?></div>
            </div>
            <div class="col">
              <div class="progress progress-sm mr-2">
                <div class="progress-bar bg-success" role="progressbar" style="width: <?= $readon; ?>0%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="10"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-users fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Success Request</div>
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $reqsuc; ?></div>
            </div>
            <div class="col">
              <div class="progress progress-sm mr-2">
                <div class="progress-bar bg-info" role="progressbar" style="width: <?= $reqsuc; ?>0%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-danger shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pending Request</div>
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $reqpen; ?></div>
            </div>
            <div class="col">
              <div class="progress progress-sm mr-2">
                <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $reqpen; ?>0%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-comment fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
<!-- Pending Requests Card Example -->
<div class="row">

<div class="col-lg-12 mb-4">
<!-- Project Card Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
    <form action="<?=base_url('admin/cetak_laporan')?>" method="post" accept-charset="utf-8" target="_blank">
    <input type="date" class="form-control" style="display: initial; width: auto;" name="datee" id="datee" value="<?php echo date('Y-m-d'); ?>">
    &nbsp;&nbsp; 
    <input type="date" class="form-control" style="display: initial; width: auto;" name="dateee" id="dateee" value="<?php echo date('Y-m-d'); ?>">&nbsp;&nbsp;
    <button type="submit" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</button>
    </form>
    </h6>
  </div>
  <div class="card-body">
              <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Category</th>
                            <th scope="col">Type</th>
                            <th scope="col">Description</th>
                            <th scope="col">Date</th>
                            <th scope="col">Progress</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; ?>
                    <?php foreach ($problem as $sm) : ?>
                   
                    <?php if ($sm['type'] == 1) {
                            $type ='Kerusakan';
                            }else {
                            $type ='Pengadaan Barang';
                            }
                            ?>
                            <?php if($sm['respont'] == 'Success'):?>
                        <tr>
                        <td><h5 style="font-size:12px;"><?= $no++;?></h5></td>
                        <?php foreach ($category as $sy) : ?>
                                        <?php if($sm['category_id']==$sy['id']){?>
                                <td><h5 style="font-size:12px;">  <?= $sy['category']; ?></h5></td>
                                        <?php  }?>
                                        <?php endforeach; ?>
                                        <td><h5 style="font-size:12px;"><?= substr($type,0,9); ?></h5></td>
                            <td><h5 style="font-size:12px;"><?= substr($sm['description'],0,10).' ...'; ?></h5></td>
                            <td><h5 style="font-size:12px;"><?= substr($sm['date_problem'],0,11); ?></h5></td>
                            <td><h5 style="font-size:12px;"><?= $sm['respont']; ?></h5></td>
                        
                        </tr>
                        <?php endif;?>
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