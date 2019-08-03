<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
        
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newUserModal">Add New User</a>
           
            <div class="card shadow mb-4">
                <div class="card-body">
              <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Image</th>
                        <th scope="col">Role</th>
                        <th scope="col">Active</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($d as $r) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $r['name']; ?></td>
                        <td><?= $r['email']; ?></td>
                        <td><?= $r['image']; ?></td>
                        <td><?= $r['role_id']; ?></td>
                        <td><?= $r['is_active']; ?></td>
                        <td><?= date('d F Y', $r['date_created']); ?></td>
                        <td>
                       
                    <a href=""  data-toggle="modal" data-target="#editUserModal<?=$r['id'];?>" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="<?=base_url('user/delete/').$r['id'];?>"class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Are You Sure ?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php $i++; ?>
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


<!-- Modal Add-->
<div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" aria-labelledby="newUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newUserModalLabel">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user/add'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="password" name="password" placeholder="password">
                    </div>
                    <!-- <div class="form-group">
                        <input type="text" class="form-control" id="image" name="image" placeholder="Image">
                    </div> -->
                    <div class="form-group">
                        <select name="role_id" id="role_id" class="form-control">
                            <?php foreach ($urole as $m) : ?>
                            <option value="<?= $m['id']; ?>"><?= $m['role']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                <select class="form-control" id="divisi" name="divisi" required>
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
                    <div class="form-group">
                    <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div> 

<!-- Modal Edit-->
<?php
        // foreach($data->result_array() as $i):
        //     $barang_id=$i['barang_id'];
        //     $barang_nama=$i['barang_nama'];
        //     $barang_satuan=$i['barang_satuan'];
        //     $barang_harga=$i['barang_harga'];
        ?>
        
        <?php foreach ($d as $r) : ?>              
<div class="modal fade" id="editUserModal<?=$r['id'];?>" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user/forward'); ?>" method="post">
                
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id" name="id" placeholder="Name" value="<?= $r['id'];?>">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?= $r['name'];?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?= $r['email'];?>" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="password" name="password" placeholder="password" value="<?= $r['password'];?>">
                    </div>
                    <!-- <div class="form-group">
                        <input type="text" class="form-control" id="image" name="image" placeholder="Image">
                    </div> -->
                    <div class="form-group">
                        <select name="role_id" id="role_id" class="form-control" required>
                        <?php foreach ($urole as $m) : ?>
                        <?php if($r['role_id']==$m['id']){?>
                        <option value="<?= $m['id']; ?>"><?= $m['role']; ?></option>
                        <?php } ?>
                        <?php endforeach; ?>
                        <?php foreach ($urole as $m) : ?>
                        <option value="<?= $m['id']; ?>"><?= $m['role']; ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <?php //if (!empty($r['divisi'])){
                ?>
                <!-- <div class="form-group" >
                    <input type="text" class="form-control" value="<?= $r['divisi']; ?>" readonly>
            </div> -->
            <?php
            //}else{
                ?>
            <div class="form-group">
                <select class="form-control" id="divisi" name="divisi">
                 <option value="<?= $r['divisi']; ?>">- <?= $r['divisi']; ?> -</option>
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
            <?php //}
            ?>
           

                    <div class="form-group">
                    <div class="form-check">
                    &nbsp;  &nbsp;<input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" <?php if($r['is_active'] == 1 ){echo 'checked';}else{echo 'uncheked';}?>>
                            <label class="form-check-label" for="is_active">
                                &nbsp; Active?
                            </label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div> 
<?php endforeach; ?>