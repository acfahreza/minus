
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
            <form action="<?=base_url('request/detail')?>/<?= $request['id']; ?>" method="post" accept-charset="utf-8" class="form mt-3 mb-3 ml-3 mr-3">
           <input type="hidden" class="form-control" id="id" name="id" value="<?= $request['id']; ?>" readonly>
           <?php $f= substr($request['nik'],0,3);?>
           
           <?php 
           if($f =='GAF'){
                $b='General Affair (GA)';
            }elseif($f =='HRD'){
                $b='Human Resource Development (HRD)';
            }elseif($f =='ACF'){
                $b='Accounting & Finance';
            }elseif($f =='FTC'){
                $b='FTTB Corporate';
            }elseif($f =='FTI'){
                $b='FTTH IKR';
            }elseif($f =='SPE'){
                $b='Special Project Event';
            }elseif($f =='PAP'){
                $b='Provisioning Access Point';
            }elseif($f =='FOP'){
                $b='Field Operation (FOP)';
            }elseif($f =='NOC'){
                $b='Networks Operation Center (NOC)';
            }elseif($f =='ITS'){
                $b='Information Technology Support (ITS)';
            }else{
                $b='';
            }
           ?>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"  id="nik" name="nik" value="<?= $request['nik']; ?>" readonly>
                </div>
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"  value="<?= $request['name']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-4">
                <?php if ($request['category_id'] == 1) {
                        $category ='Network';
                        }else if($request['category_id'] == 2){
                        $category ='Support';
                         }else if ($request['category_id'] == 3){
                        $category ='Hardware';
                        }else{
                        $category ='Software';
                        }
                        ?>
                <input type="text" class="form-control"  value="<?= $category; ?>" readonly>
                   </div>
                   <label for="name" class="col-sm-2 col-form-label">Type</label>
                <div class="col-sm-4">
                <?php if ($request['type'] == 2) {
                        $type ='Pengadaan Barang';
                        }else {
                        $type ='Kerusakan';
                        }
                        ?>
                <input type="text" class="form-control" name="type" id="type" value="<?= $type; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Divisi</label>
                <div class="col-sm-10">
                <input type="text" class="form-control"  value="<?= $b; ?>" readonly>
               <div class="invalid-feedback">
                </div>
                </div>
            </div>  
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                <textarea class="form-control" placeholder="Required Description" style="height: 67px; margin-top: 0px; margin-bottom: 0px;" readonly><?= $request['description']; ?></textarea>
                <div class="invalid-feedback">
                </div>
                </div>
            </div>   
    <?php if($request['type']== 2):?>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Recommend</label>
                <div class="col-sm-4">
                <select class="form-control" id="recomend1" name="recomend1">
            <?php foreach ($jenis as $j ): ?>     
            <?php if($request['category_id'] == $j['id_jenis']):?>
            <option value="<?= $j['nama_barang'] ?>"> <?= $j['nama_barang'] ?></option>
            <?php endif;?>
            <?php endforeach; ?>
            </select>
                </div>
              
            </div>
            
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Problem solved</label>
                <div class="col-sm-10">
                <textarea class="form-control" name="recomend2" id="recomend2" placeholder="Required Description" style="height: 67px; margin-top: 0px; margin-bottom: 0px;" required><?= $request['recomend']; ?></textarea>
                <div class="invalid-feedback">
                </div>
                </div>
            </div>  
            <?php else:?>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Problem solved</label>
                <div class="col-sm-10">
                <textarea class="form-control" readonly placeholder="Required Description" style="height: 67px; margin-top: 0px; margin-bottom: 0px;"><?= $request['recomend']; ?></textarea>
                <div class="invalid-feedback">
                </div>
                </div>
            </div> 
    <?php endif;?>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Kind</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" name="kind" id="kind" value="<?= $request['kind']; ?>" readonly>
                </div>
                <div class="invalid-feedback">
                </div>
                <label for="name" class="col-sm-2 col-form-label">Progress</label>
                <div class="col-sm-4">
                <select class="form-control" id="respont" name="respont">
                    <option value="<?= $request['respont'];?>"><?= $request['respont']; ?></option>
                        <?php if($request['respont'] =="Order"){
                           echo "<option value='Pending'>Pending</option>
                              <option value='On Progress'>On Progress</option>
                              <option value='Success'>Success</option>";
                         }elseif($request['respont'] =="Pending"){
                            echo "<option value='Order'>Order</option>
                            <option value='On Progress'>On Progress</option>
                            <option value='Success'>Success</option>";
                        }else if($request['respont'] =="On Progress"){
                            echo "<option value='Order'>Order</option>
                            <option value='Pending'>Pending</option>
                            <option value='Success'>Success</option>";
                        }else if($request['respont'] =="Success"){
                            echo "<option value='Order'>Order</option>
                            <option value='Pending'>Pending</option>
                            <option value='On Progress'>On Progress</option>";
                        }?>
                    </select>
                </div>
            </div>

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