<form action="<?php echo site_url('role/update/'.$data ['id'])?>" method="post">
    Role : <input type="text" name="role" value="<?php echo $data ['role']?>"required> <br>
    <input type="submit" value="Submit">
</form>
