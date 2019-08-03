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
           <!-- <form id="form1" action="<?= base_url('order'); ?>" method="post" accept-charset="utf-8" class="form mt-3 mb-3 ml-3 mr-3" onsubmit="return false"> -->
            <form id="form1" action="<?= base_url('order'); ?>" method="post" accept-charset="utf-8" class="form mt-3 mb-3 ml-3 mr-3">
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
                    <select class="form-control" id="category_id" name="category_id" onchange="tampilkan()">
                    <?php foreach ($category as $c) : ?>
                    <option value="<?= $c['id']; ?>"><?= $c['category']; ?></option>
                    <?php endforeach; ?>
                    </select>
                    <?= form_error('category_id', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
        

                <label for="name" class="col-sm-2 col-form-label">Type</label>
                <div class="col-sm-4">
                    <select class="form-control" id="type" name="type" onchange="tampilkan()" required>
                    <option value="2">Pengadaan Barang</option>
                    <option value="1">Kerusakan</option>
                    </select>
                </div>
            </div>
 
            <script>
function tampilkan(){
  var nama_kota=document.getElementById("form1").category_id.value;
  var nama_tempat=document.getElementById("form1").type.value;
  if (nama_kota=="1" && nama_tempat=="1")
    {
        //Hardware
        document.getElementById("tampil").innerHTML=`
        <div class="form" style="margin-top:7px;">
        <label class="form-check-label">
            Ringan
            </label>
                <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="description[]" value="Kerusakan komputer Server Database" id="customSwitch1">
                <label class="custom-control-label" for="customSwitch1">Kerusakan komputer Server Database</label>
                </div>
                <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="description[]" value="Kerusakan pada komponen pc/laptop" id="customSwitch2">
                <label class="custom-control-label" for="customSwitch2">Kerusakan pada komponen pc/laptop</label>
                </div>
                <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="description[]" value="Kerusakan pada monitor pc/laptop" id="customSwitch3">
                <label class="custom-control-label" for="customSwitch3">Kerusakan pada monitor pc/laptop</label>
                </div>
                <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="description[]" value="Kerusakan Pada mouse/keyboard" id="customSwitch4">
                <label class="custom-control-label" for="customSwitch4">Kerusakan Pada mouse/keyboard</label>
                </div>
                <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="description[]" value="Kerusakan pada Uninterruptible Power Supply (UPS)" id="customSwitch5">
                <label class="custom-control-label" for="customSwitch5">Kerusakan pada Uninterruptible Power Supply (UPS)</label>
                </div>
            </div>
        <div class="form">
            <label class="form-check-label">
            Sedang
            </label>
                <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="description[]" value="Kerusakan pada printer yang tidak dapat mencetak" id="customSwitch6">
                <label class="custom-control-label" for="customSwitch6">Kerusakan pada printer yang tidak dapat mencetak</label>
                </div>
                <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="description[]" value="Kerusakan pada scanner" id="customSwitch7">
                <label class="custom-control-label" for="customSwitch7">Kerusakan pada scanner</label>
                </div>
            </div>
            <div class="form" style="margin-bottom:2px;">
             <label class="form-check-label">
             Berat
            </label>
                <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="description[]" value="Kerusakan pada router/switch" id="customSwitch8">
                <label class="custom-control-label" for="customSwitch8">Kerusakan pada router/switch</label>
                </div>
                <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="description[]" value="Kerusakan pada AP Wifi" id="customSwitch9">
                <label class="custom-control-label" for="customSwitch9">Kerusakan pada AP Wifi</label>
                </div>
                <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="description[]" value="Kerusakan pada modem internet" id="customSwitch10">
                <label class="custom-control-label" for="customSwitch10">Kerusakan pada modem internet</label>
                </div>
            </div>
                `;
    }
  else if (nama_kota=="2" && nama_tempat=="1")
    {
        //Software
        document.getElementById("tampil").innerHTML=`
        <div class="form">
            <label class="form-check-label">
            Ringan
            </label>
        <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="description[]" value="Tidak dapat login pada OS Windows" id="customSwitch11">
                <label class="custom-control-label" for="customSwitch11">Tidak dapat login pada OS Windows</label>
                </div>
                <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="description[]" value="Tidak Dapat Membuka Aplikasi Microsoft" id="customSwitch12">
                <label class="custom-control-label" for="customSwitch12">Tidak Dapat Membuka Aplikasi Microsoft</label>
                </div>
            </div>
        <div class="form">
            <label class="form-check-label">
            Sedang
            </label>
                <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="description[]" value="Tidak Dapat Membuka Aplikasi Database" id="customSwitch13">
                <label class="custom-control-label" for="customSwitch13">Tidak Dapat Membuka Aplikasi Database</label>
                </div>
                <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="description[]" value="Tidak Dapat Membuka Aplikasi Pendukung Kerja" id="customSwitch22">
                <label class="custom-control-label" for="customSwitch22">Tidak Dapat Membuka Aplikasi Pendukung Kerja</label>
                </div>
        </di>
        <div class="form">
            <label class="form-check-label">
            Berat
            </label>
                <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="description[]" value="pc/laptop terkena virus/malware" id="customSwitch14">
                <label class="custom-control-label" for="customSwitch14">pc/laptop terkena virus/malware</label>
                </div>
            </div>`;
    }
  else if (nama_kota=="3" && nama_tempat=="1")
    {
        //Network
        document.getElementById("tampil").innerHTML=`
        <div class="form">
            <label class="form-check-label">
            Ringan
            </label>
        <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="description[]" value="Tidak Dapat Terhubung dengan Komputer Server" id="customSwitch15">
                <label class="custom-control-label" for="customSwitch15">Tidak Dapat Terhubung dengan Komputer Server</label>
                </div>
                <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="description[]" value="Tidak Dapat Terkoneksi dengan Internet" id="customSwitch16">
                <label class="custom-control-label" for="customSwitch16">Tidak Dapat Terkoneksi dengan Internet</label>
                </div>
            </div>
            <div class="form">
            <label class="form-check-label">
            Sedang
            </label>
                <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="description[]" value="kerusakan pada connector jaringan" id="customSwitch17">
                <label class="custom-control-label" for="customSwitch17">kerusakan pada connector jaringan</label>
                </div>
                <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="description[]" value="Kerusakan / terputusnya Kabel pada jaringan" id="customSwitch18">
                <label class="custom-control-label" for="customSwitch18">Kerusakan / terputusnya Kabel pada jaringan</label>
                </div>
            </div>
                <div class="form">
            <label class="form-check-label">
            Berat
            </label>
                <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="description[]" value="konfigurasi server dengan client" id="customSwitch19">
                <label class="custom-control-label" for="customSwitch19">Konfigurasi Server dengan Client</label>
                </div>
            </div>`;
    }
    else if (nama_kota=="4" && nama_tempat=="1")
    {
        document.getElementById("tampil").innerHTML=`<div class="form-group row">
                <div class="col-sm-10">
                <textarea class="form-control" id="description" name="description[]" placeholder="Required Description" style="height: 118px;"></textarea>
                <div class="invalid-feedback">
                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                </div>`;
    }else{
        document.getElementById("tampil").innerHTML=`<div class="form-group row">
                <div class="col-sm-10">
                <textarea class="form-control" id="description" name="description[]" placeholder="Required Description" style="height: 118px;"></textarea>
                <div class="invalid-feedback">
                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                </div>`;
    }
}
</script>


            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                <div class="form">
                <div id="tampil"></div>
            </div>
                </div>
                </div>
            
            
            <br>
            <br>
            <br>
           

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