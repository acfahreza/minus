<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="varchar">Kode Barang <?php echo form_error('kode_barang') ?></label>
            <input type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="Kode Barang" value="<?php echo $kode_barang; ?>" readonly/>
        </div>
        <div class="form-group">
            <label for="varchar">Nama Barang <?php echo form_error('nama_barang') ?></label>
            <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?php echo $nama_barang; ?>" />
        </div>
       
        <div class="form-group">
            <label for="int">Foto Barang </label>
            <input type="file" class="form-control" name="foto_barang" />
        </div>
        <div class="form-group">
            <label for="int">Jenis Barang </label>
            <select name="id_jenis" class="form-control">
                <?php 
                $sql = $this->db->get('pro');
                foreach ($sql->result() as $row) {
                 ?>
                <option value="<?php echo $row->id ?>"><?php echo $row->category ?></option>
            <?php } ?>
            </select>
        </div>

        <input type="hidden" name="id_barang" value="<?php echo $id_barang; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('barang') ?>" class="btn btn-default">Cancel</a>
    </form>