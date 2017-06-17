<?php

$conn = new mysqli("localhost","ahmed","123","school_record");
////////////Select subjects///////////////////////////

//////////////////////////////////////////////////////
if($_REQUEST['req'] != ''){
    ///////////Add new record
    if($_REQUEST['req'] == 'add_new_record'){
    
    $name = $_REQUEST['s_name'];
    $subject = $_REQUEST['s_subject'];
    $fee = $_REQUEST['s_fee'];
    
    $sql = "INSERT INTO student_data (name, subject, fee)
           VALUES ('$name', '$subject', '$fee')";
    
     if ($conn->query($sql) != TRUE) 
       echo "Error: " . $sql . "<br>" . $conn->error;
 
///////////Delete a record
} elseif($_REQUEST['req'] == 'delete_request'){
        $del = $_REQUEST['id'];
        $del_sql ="DELETE  FROM student_data WHERE ID=$del";
        $del_result=$conn->query($del_sql);
        $up = "ALTER TABLE student_data AUTO_INCREMENT=1";
        $conn->query($up);
}


}else
    echo "Add data";



    
    
$query="SELECT  * FROM student_data"; 
  $result=$conn->query($query);

?>



    <?php while( $row =$result->fetch_assoc()) : ?>
            <tr>
                  <td><?php echo $row['ID'] ?></td>
                  <td><?php echo $row['name'] ?></td>
                  <td><?php echo $row['subject'] ?></td>
                  <td><?php echo $row['fee'] ?>$</td>
                  <td>
                      <div class="dropdown">
                      <button class="btn btn-success" data-toggle="dropdown">Action<span class="caret"></span></button>
                          <ul class="dropdown-menu">
                              <li><a href="#" onclick="edit('edit_button',<?php echo $row['ID'] ?>)">Edit</a></li>
                              <li><a href="javascript:void(0);" onclick="ajax('delete_request' , <?php echo $row['ID']; ?>)">Delete</a></li>
                          </ul>
                          </div>
                  </td>
              </tr>

<?php endwhile; ?>