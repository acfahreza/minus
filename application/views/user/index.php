<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="card mb-3 col-lg-8 p-3" style="max-width: 660px;">
        <div class="row no-gutters">
    
            <div class="col-md-4">
            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img border border-light" alt="...">
            </div>
            <div class="col-md-8">
            <div class="card-body">
<?php
 if($user['divisi']=='General Affair (GA)'){
    $b='GA00'.$user['id'];
}elseif($user['divisi']=='Human Resource Development (HRD)'){
    $b='HRD00'.$user['id'];
}elseif($user['divisi']=='Accounting & Finance'){
    $b='AF00'.$user['id'];
}elseif($user['divisi']=='FTTB Corporate'){
    $b='FTC00'.$user['id'];
}elseif($user['divisi']=='FTTH IKR'){
    $b='FTI00'.$user['id'];
}elseif($user['divisi']=='Special Project Event'){
    $b='SPE00'.$user['id'];
}elseif($user['divisi']=='Provisioning Access Point'){
    $b='PAP00'.$user['id'];
}elseif($user['divisi']=='Field Operation (FOP)'){
    $b='FOP00'.$user['id'];
}elseif($user['divisi']=='Networks Operation Center (NOC)'){
    $b='NOC00'.$user['id'];
}elseif($user['divisi']=='Information Technology Support (ITS)'){
    $b='ITS00'.$user['id'];
}else{
    $b=$user['id'];
}
?>
                <div class="form-group row mb-0 ">
                <label for="inputEmail3" class="col-sm-3 col-form-label"  style="padding: 0px;">NIK : </label>
                <div class="col-sm-8">
                <div class="form-control border border-0"  style="padding: 0px;"><?= $b; ?></div>
                </div>
                </div>
                <div class="form-group row mb-0 ">
                <label for="inputEmail3" class="col-sm-3 col-form-label" style="padding: 0px;">Email : </label>
                <div class="col-sm-8">
                <div class="form-control border border-0"  style="padding: 0px;"><?= $user['email']; ?></div>
                </div>
                </div>
                <div class="form-group row mb-0">
                <label for="inputEmail3" class="col-sm-3 col-form-label"  style="padding: 0px;">Name :</label>
                <div class="col-sm-8">
                <div class="form-control border border-0"  style="padding: 0px;"> <?= $user['name']; ?></div>
                </div>
                </div>
                <div class="form-group row mb-0">
                <label for="inputEmail3" class="col-sm-3 col-form-label"  style="padding: 0px;">Divisi :</label>
                <div class="col-sm-8">
                <div class="form-control border border-0" style="padding: 0px;"> <?= $user['divisi']; ?></div>
                </div>
                </div>
                    <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?></small></p>
            </div>
            </div>

  </div>
</div>
   
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 