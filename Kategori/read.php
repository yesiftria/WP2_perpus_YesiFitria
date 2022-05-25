<a href="<?php echo site_url($this->uri->segment(1).'/create')?> ">Create</a>

<table border="1px">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
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
                        <td>$row[nama_kategori]</td>
                        <td>
                ";        
        ?>                  <a href='<?php echo site_url($this->uri->segment(1).'/edit/'.$row['id_kategori']);?>'>Edit</a>
                            <a href='<?php echo site_url($this->uri->segment(1).'/delete/'.$row['id_kategori']);?>' onclick="javascript:return confirm('Delete data?')">Delete</a>
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
