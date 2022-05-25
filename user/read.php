<a href="<?php echo site_url($this->uri->segment(1).'/create')?> ">Create</a>

<table border="1px">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Role</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php
            $no = 1;
            foreach($data->result_array()as $row){
                echo"
                    <tr>
                        <td>$no</td>
                        <td>$row[nama]</td>
                        <td>$row[role]</td>
                        <td><img src='".base_url('uploads/user/'.$row['image'])."' alt='no image'></td>
                        <td>
                ";        
        ?>                  
                            <a href='<?php echo site_url($this->uri->segment(1).'/edit/'.$row['id']);?>'>Edit</a>
                            <a href='<?php echo site_url($this->uri->segment(1).'/editimage/'.$row['id']);?>'>Editimage</a>
                            <a href='<?php echo site_url($this->uri->segment(1).'/delete/'.$row['id']);?>' onclick="javascript:return confirm('Delete data?')">Delete</a>
        <?php
            echo"
                
        
                            </td>
                    
                    </tr>

                ";
            $no++;
            }
        ?>
    </tbody>


</table>
