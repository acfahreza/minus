<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-8">
        <div class="card">
        <!--   //form_open_multipart('user/edit'); ?> -->
            <form action="<?= base_url('user/edit'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form mt-3 mb-3 ml-3 mr-3">
            <div class="form-group row" >
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                </div>
            </div>
            <?php         
                if($user['divisi']=='General Affair (GA)'){
                    $b='GAF00'.$user['id'];
                }elseif($user['divisi']=='Human Resource Development (HRD)'){
                    $b='HRD00'.$user['id'];
                }elseif($user['divisi']=='Accounting & Finance'){
                    $b='ACF00'.$user['id'];
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
            <div class="form-group row" >
                <label for="email" class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?= $b; ?>" readonly>
                </div>
            </div>
            <?php if (!empty($user['divisi'])){
                ?>
                <div class="form-group row" >
                <label for="email" class="col-sm-2 col-form-label">DIVISI</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?= $user['divisi']; ?>" readonly>
                </div>
            </div>
            <?php
            }else{
                ?>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Divisi</label>
                <div class="col-sm-10">
                <select class="form-control" id="divisi" name="divisi">
                 <option>- Select Divisi -</option>
                 <option value="General Affair (GA)">General Affair (GA)</option> 
                 <option value="Human Resource Development (HRD)">Human Resource Development (HRD)</option> 
                 <option value="Accounting & Finance">Accounting & Finance</option>
                 <option value="FTTB Corporate">FTTB Corporate</option>
                 <option value="FTTH IKR">FTTH IKR</option>
                 <option value="Special Project Event">Special Project Event</option>
                 <option value="Provisioning Access Point">Provisioning Access Point</option> 
                 <option value="Field Operation (FOP)">Field Operation (FOP)</option> 
                 <option value="Networks Operation Center (NOC)"> Networks Operation Center (NOC)</option> 
                 <option value="Information Technology Support (ITS)">Information Technology Support (ITS)</option>
                    </select>
                </div>
            </div>
            <?php }
            ?>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Full name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Picture</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>


            </form>

            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 