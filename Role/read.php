<a href="<?php echo site_url('role/create')?> ">Create</a>

<table border="1px">
    <thead>
        <tr>
            <th>No</th>
            <th>Role</th>
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
                        <td>$row[role]</td>
                        <td>
                ";        
        ?>                  <a href='<?php echo site_url('role/edit/'.$row['id']);?>'>Edit</a>
                            <a href='<?php echo site_url('role/delete/'.$row['id']);?>' onclick="javascript:return confirm('Delete data?')">Delete</a>
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
