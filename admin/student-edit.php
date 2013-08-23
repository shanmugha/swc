
<div class="content-box-header">
    <h3 class="c-head">Students</h3>

    <div class="clear"></div>
</div>
<?php
require_once(__DIR__ . '/../config/connection.php');
$connect = new Connection();
$id = $_POST['id'];
$sql_select_form_school = "SELECT * FROM student where id = '$id'";
$result = mysql_query($sql_select_form_school) or die ('Error updating database: ' . mysql_error());
?>
<div class="content-box-content">
    <form class="form-fill" method="post">
        <?php if($result) {
        $getResult = mysql_fetch_row($result);
        ?>
        <label>Name of the Student</label>
        <input type="text" placeholder="First Name" value="<?php echo ($getResult[1]);?>" name="firstname">
        <input type="text" placeholder="Last Name" value="<?php  echo ($getResult[2]);?>" name="lastname">
        <label>Gender</label>
        <select class="span2" name="gender">
            <option>Male</option>
            <option>Female</option>
        </select>
        <label>Date Of Birth</label>
        <input type="text" placeholder="DD/MM/YYY" name="dob" value="<?php   echo ($getResult[4]);?>">
        <label>Blood Group</label>
        <select class="span2" name="bloodGrp">
            <option>B+</option>
            <option>B-</option>
            <option>A+</option>
            <option>A-</option>
            <option>AB+</option>
            <option>AB-</option>
            <option>O+</option>
            <option>O-</option>
        </select>
        <label>Guardian/Parent Name</label>
        <input type="text" placeholder="First Name" name="gFname" value="<?php echo ($getResult[6]);?>">
        <input type="text" placeholder="Last Name" name="gLname" value="<?php echo ($getResult[7]);?>">
        <label>Occupation</label>
        <input type="text" name="occupation" value="<?php echo ($getResult[8]);?>">
        <label>Address</label>
        <textarea rows="3" placeholder="Permanent Address" name="pAdress" ><?php echo ($getResult[9]);?></textarea>
        <textarea rows="3" placeholder="Current Address" name="cAddress"><?php echo ($getResult[10]);?></textarea>
        <label>Contact Number</label>
        <input type="text" placeholder="Telephone Number" name="telNumber" value="<?php echo ($getResult[11]);?>">
        <input type="text" placeholder="Mobile Number" name="mobNumber" value="<?php echo ($getResult[12]);?>">
        <label>Admission No</label>
        <input class="span1" type="text" name="adNo" value="<?php echo ($getResult[13]);?>">
        <label>Year of joining</label>
        <input type="text" placeholder="DD/MM/YYY" name="yearofJoin" value="<?php echo ($getResult[14]);?>">
        <label>Class</label>
        <input class="span1" type="text" placeholder="Std" name="std" value="<?php echo ($getResult[15]);?>">
        <input class="span1" type="text" placeholder="Div" name="div" value="<?php echo ($getResult[16]);?>">
        <label>Last Eaxame Total Mark</label>
        <label>Subjects Studied upto</label>
        <input class="span2" type="text" placeholder="Maths" name="maths" value="<?php echo ($getResult[17]);?>">
        <input class="span2" type="text" placeholder="English / Languge" name="english" value="<?php echo ($getResult[18]);?>">
        <input class="span2" type="text" placeholder="Social Studies" name="ss" value="<?php echo ($getResult[19]);?>">
        <input class="span2" type="text" placeholder="Science" name="science" value="<?php echo ($getResult[20]);?>">
        <label>Previous school</label>
        <input type="text" name="prevSchool" value="<?php echo ($getResult[21]);?>">
        <label>Type of Disability, if any</label>
        <textarea rows="3" name="anyDisability"><?php echo ($getResult[22]);?></textarea>
        <label>Any Reservation</label>
        <select class="span1" name="anyReservation">
            <option>Yes</option>
            <option>No</option>
        </select>
        <label>Sports/Arts achievements</label>
        <textarea name="achivements"><?php echo ($getResult[24]);?></textarea>
            <input type="hidden" name="create-edit" value="<?php echo $id; ?>"/>
        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <a class="btn" href="admin/students.php" type="button">Cancel</a>
        </div>
        <?php }?>
    </form>
</div>