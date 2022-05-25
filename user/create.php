<?php echo $error ?>

<form action="<?php echo site_url($this->uri->segment(1).'/save')?>" method="post" enctype="multipart/form-data">
    Nama : <input type="text" name="nama" required> <br>
    Email : <input type="text" name="email" required> <br>
    Image : <input type="file" name="image" required> <br>
    Password : <input type="text" name="password" required> <br>
    Role : 
        <select name="id" required >
            <?php
                foreach($role->result_array()as $row){
                    echo"<option value=' ".$row['id']."'>" .$row['role']."</option>";
                }
            ?>
        </select>
    <br>
    Active :
        <select name="is_active" required>
            <option value="1">1</option>
            <option value="0">0</option>
        </select>
    <br>


    <input type="submit" value="Submit">
</form>


