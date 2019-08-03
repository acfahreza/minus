<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">

<!-- Content Column -->
<div class="col-lg-6 mb-4">

<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

<?= $this->session->flashdata('message'); ?>

<!-- <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Add New Role</a> -->
  <!-- Project Card Example -->
    <div class="card-header py-3" style="border-bottom: none;">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary"> Category </h6>
            <a href=""  class="d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#newRoleModal">Add Category</a>
          </div>
  
    <div class="card-body">
    <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php 
                $sql = $this->db->get('pro');
                foreach ($sql->result() as $row): ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $row->category; ?></td>
                        <td>
                        <a href=""  data-toggle="modal" data-target="#editcategoryModal<?=$row->id;?>" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="<?=base_url('admin/categorydel/').$row->id;?>"class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Are You Sure ?')"><i class="fas fa-trash"></i></a>
                        </td>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </div>
  </div>

</div>

<div class="col-lg-6 mb-4">

<div class="card-header py-3" style="border-bottom: none;">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary"> Role </h6>
          </div>
    <div class="card-body">
    <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($role as $r) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $r['role']; ?></td>
                        <td>
                            <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-warning">access</a>
                            <!-- <a href="" class="badge badge-success">edit</a>
                            <a href="" class="badge badge-danger">delete</a> -->
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Add New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/categoryadd'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="category" name="category" placeholder="Category name">
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
<?php 
                $sql = $this->db->get('pro');
                foreach ($sql->result() as $row): ?>
<!-- Modal -->
<div class="modal fade" id="editcategoryModal<?=$row->id;?>" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/categoryedit'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                    <input type="hidden" class="form-control" id="id" name="id" placeholder="Category name" value="<?=$row->id;?>">
                        <input type="text" class="form-control" id="category" name="category" placeholder="Category name" value="<?=$row->category;?>">
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