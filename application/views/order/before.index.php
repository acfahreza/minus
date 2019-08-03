<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="text-center">          
                                </div>

                                <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-8">
        <div class="card">
        <!--   //form_open_multipart('user/edit'); ?> -->
            <form action="<?= base_url('order'); ?>" method="post" accept-charset="utf-8" class="form mt-3 mb-3 ml-3 mr-3">
            <div class="form-group row" >
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
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
                    $b='';
                }
                ?>
                <label for="email" class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="nik" name="nik" value="<?= $b; ?>" readonly>
                    <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>" readonly>
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Divisi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="divisi" name="divisi" value="<?= $user['divisi']; ?>" readonly>
                    <?= form_error('divisi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-4">
                    <select class="form-control" id="category_id" name="category_id">
                    <?php foreach ($category as $c) : ?>
                    <option value="<?= $c['id']; ?>"><?= $c['category']; ?></option>
                    <?php endforeach; ?>
                    </select>
                    <?= form_error('category_id', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <label for="name" class="col-sm-2 col-form-label">Type</label>
                <div class="col-sm-4">
                    <select class="form-control" id="type" name="type">
                    <option value="1">Kerusakan</option>
                    <option value="2">Pengadaan Barang</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                <textarea class="form-control" id="description" name="description" placeholder="Required Description" style="height: 118px;"></textarea>
                <div class="invalid-feedback">
                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                </div>
            </div>
            <!-- <div class="form-group row">
                <div class="col-sm-2">Picture</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                             <img src="<?= base_url('assets/img/order/') . $user['image']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary float-right">Post</button>
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