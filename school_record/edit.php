
<?php

$conn = new mysqli("localhost","ahmed","123","school_record");
//////////////Select subjects////////////////////
$sql="SELECT * FROM subjects";
$data=$conn->query($sql);
/////////////////////////////////////////////////
if($_REQUEST['id'] !=''){
    $sql= "SELECT * FROM student_data WHERE ID='$_REQUEST[id]'";
    
    $result=$conn->query($sql);
    $row = $result->fetch_assoc();
}

?>
              <div class="form-group">
                  <label class="label-control col-md-2">Employee Name</label>
                  <div class="col-md-8">
                  <input type="text" id="student_name" class="form-control" value="<?php echo $row['name'] ?>">
                  </div>
              </div>
              
              <div class="form-group">
                  <label class="label-control col-md-2">Student Subject</label>
                  <div class="col-md-3">
                  <select id="student_subject" class="form-control">
                      <option value="">Select an Subject</option>
                      <?php while($subj=$data->fetch_assoc()): ?>
                      <option value="<?php echo $subj['subject'] ?>"
                              <?php echo ( $subj['subject'] == $row['subject'] )?'selected' : ""  ?>><?php echo $subj['subject'] ?></option>
                      <?php endwhile; ?>
                  </select>
                  </div>
 
                  <label class="label-control col-md-2">Student Fee</label>
                  <div class="col-md-3">
                  <input type="number" id="student_fee" class="form-control" value="<?php echo $row['fee'] ?>">
                  </div>
                  
                  </div>
              
                  <div class="form-group">
                      <div class="col-md-8 col-md-offset-2">
                      <input type="submit" class="btn btn-danger form-control" onclick="edit('edit_button',<?php echo $row['ID'] ?>)" value="Edit Record">
                      </div>
                  </div>
              
 