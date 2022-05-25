<form action="<?php echo site_url($this->uri->segment(1).'/update/'.$data ['id'])?>" method="post">
    Nama : <input type="text" name="nama" value="<?php echo $data['nama'] ?>" required> <br>
    Email : <input type="text" name="email" value="<?php echo $data['email'] ?>"  required> <br>
    Image : <input type="text" name="image" value="<?php echo $data['image'] ?>" required> <br>
    Password : <input type="text" name="password" value="<?php echo $data['password'] ?>" required> <br>
    Role : 
        <select name="id" required >
            <option value="<?php echo $data['id']?>"><?php echo $data['role']?></option>
            <?php
                foreach($role->result_array()as $row){
                    echo"<option value=' ".$row['id']."'>" .$row['role']."</option>";
                }
            ?>
        </select>
    <br>
    Active :
        <select name="is_active" required>
            <option value="<?php echo $data['is_active']?>"><?php echo $data['is_active']?>"</option>
            <option value="1">1</option>
            <option value="0">0</option>
        </select>
    <br>
    <input type="submit" value="Submit">
</form>

