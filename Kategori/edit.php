<form action="<?php echo site_url($this->uri->segment(1).'/update'.$data ['id_kategori'])?>" method="post">
    Nama Kategori : <input type="text" name="nama_kategori" value="<?php echo $data ['nama_kategori']?>"required> <br>
    <input type="submit" value="Submit">
</form>
