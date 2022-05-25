<?php //echo $error ?>

<form action="<?php echo site_url($this->uri->segment(1).'/updateimage/'.$data['id'])?>" method="post" enctype="multipart/form-data">
    Before : <img src="<?php echo base_url('uplouds/user/'.$data['image'])?>"alt='no image'></br>
    Image : <input type="file" name="image" required> <br>

    <input type="submit" value="Submit">
</form>