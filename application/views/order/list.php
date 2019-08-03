<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
        
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>
           
            <div class="card shadow mb-4">
                <div class="card-body">
              <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Type</th>
                        <th scope="col">Description</th>
                        <!-- <th scope="col">Image</th> -->
                        <th scope="col">Date</th>
                        <th scope="col">Respont</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php $i = 1; ?>
                    <?php foreach ($list as $r) : ?>
                    <?php if($user['name'] == $r['name']): ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $r['name']; ?></td>
                        <td>
                        <?php foreach ($problem as $p) : ?>
                            <?php if($p['id'] == $r['category_id']): ?>
                                   <?= $p['category']; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </td>
                        <td>
                        <?php if ($r['type'] == 1) {
                            $type ='Kerusakan';
                            }else {
                            $type ='Pengadaan Barang';
                            }
                            ?><?= substr($type,0,9); ?>
                        </td>
                        <td><?= $r['description']; ?></td>
                        <!-- <td><?= $r['image']; ?></td> -->
                        <td><?= $r['date_problem']; ?> <?= $r['time']; ?></td>
                        <td><?= $r['respont']; ?></td>
                        <td>
                           <center> <a href=""  data-toggle="modal" data-target="#editUserModal<?= $r['id'];?>" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                            <!-- <a href="<?=base_url('user/delete/').$r['id'];?>"class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Are You Sure ?')"><i class="fas fa-trash"></i></a> --></center>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endif; ?>
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



<!-- Modal Edit-->
<?php
        // foreach($data->result_array() as $i):
        //     $barang_id=$i['barang_id'];
        //     $barang_nama=$i['barang_nama'];
        //     $barang_satuan=$i['barang_satuan'];
        //     $barang_harga=$i['barang_harga'];
        ?>
        
        <?php foreach ($list as $r) : ?>
<div class="modal fade" id="editUserModal<?= $r['id'];?>" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">View Order Date : <?= $r['date_problem'];?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('order/turnoff/'); ?><?= $r['id'];?>" method="post">
                
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id" name="id" placeholder="Name" value="<?= $r['id'];?>" readonly>
                        <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-4">
                <input type="text" class="form-control"  id="nik" name="nik" value="<?= $r['nik']; ?>" readonly>
                </div>
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-4">
                <input type="text" class="form-control"  value="<?= $r['name']; ?>" readonly>
                </div>
                </div>
                <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Type</label>
                <div class="col-sm-4">
                <input type="text" class="form-control"  id="nik" name="nik" value="<?= $type; ?>" readonly>
                </div>
                <label for="name" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-4"><?php foreach ($problem as $p) : ?>
                <?php if($p['id'] == $r['category_id']): ?>
                <input type="text" class="form-control"  value="<?= $p['category']; ?>" readonly>
                <?php endif; ?>
                            <?php endforeach; ?>
                </div>
                </div>
                    </div>
                    <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Problem</label>
                <div class="col-sm-10">
                <textarea  style="height: 51px; margin-top: 0px; margin-bottom: 0px;" readonly class="form-control" id="description" name="description" placeholder="Required Description" style="height: 118px;"><?= $r['description'];?></textarea>
                </div>
                </div>
                    <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Resolve</label>
                <div class="col-sm-10">
                <textarea  style="height: 51px; margin-top: 0px; margin-bottom: 0px;" readonly class="form-control" id="description" name="description" placeholder="Required Description" style="height: 118px;"><?= $r['recomend'];?></textarea>
                </div>
                </div>
                   
                   
                    <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-4">
                <input type="text" class="form-control"  id="nik" name="nik" value="<?= $r['kind']; ?>" readonly>
                </div>
                <label for="name" class="col-sm-2 col-form-label">Respond</label>
                <div class="col-sm-4">
                <input type="text" class="form-control"  value="<?= $r['respont']; ?>" readonly>
                </div>
                </div>
                    
                </div>
                <div class="modal-footer">
                    
                    <?php 
                    if($r['respont']=='Success'){?>
                    <button type="submit" class="btn btn-success">Success</button>
                    <?php
                        }?>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div> 
<?php endforeach;?>