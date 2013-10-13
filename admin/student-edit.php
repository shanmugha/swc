
<div class="content-box-header">
    <h3 class="c-head">Students</h3>

    <div class="clear"></div>
</div>
<?php
//require_once(__DIR__ . '/../config/connection.php');
include(dirname(__FILE__)."/../config/connection.php");
$connect = new Connection();
$url = $connect->baseurl.'/admin/students.php';

$id = $_POST['id'];
$sql_select_form_school = "SELECT * FROM student where id = '$id'";
$result = mysql_query($sql_select_form_school) or die ('Error updating database: ' . mysql_error());
?>
<div class="content-box-content">
    <form class="form-fill" method="post">
        <?php if($result) {
        $getResult = mysql_fetch_array($result);
        ?>
        <label>Admission No</label>
        <input class="span1" type="text" name="adNo" value="<?php echo ($getResult['admissionNo']);?>">
        <label>Name of the Student</label>
        <input type="text" placeholder="First Name" value="<?php echo ($getResult['first_name']);?>" name="firstname">
        <input type="text" placeholder="Last Name" value="<?php  echo ($getResult['last_name']);?>" name="lastname">
        <label>Gender</label>
        <select class="span2" name="gender">
            <option>Male</option>
            <option>Female</option>
        </select>
        <label>Date Of Birth</label>
        <input type="text" placeholder="DD/MM/YYY" name="dob" value="<?php   echo ($getResult['dob']);?>">
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
        <input type="text" placeholder="First Name" name="gFname" value="<?php echo ($getResult['guardianFname']);?>">
        <input type="text" placeholder="Last Name" name="gLname" value="<?php echo ($getResult['guardianLname']);?>">
        <label>Occupation</label>
        <input type="text" name="occupation" value="<?php echo ($getResult['occupation']);?>">
        <label>Address</label>
        <textarea rows="3" placeholder="Permanent Address" name="pAdress" ><?php echo ($getResult['permanent_address']);?></textarea>
        <textarea rows="3" placeholder="Current Address" name="cAddress"><?php echo ($getResult['current_address']);?></textarea>
        <label>Contact Number</label>
        <input type="text" placeholder="Telephone Number" name="telNumber" value="<?php echo ($getResult['telephone']);?>">
        <input type="text" placeholder="Mobile Number" name="mobNumber" value="<?php echo ($getResult['mobile']);?>">
        <label>Year of joining</label>
        <input type="text" placeholder="DD/MM/YYY" name="yearofJoin" value="<?php echo ($getResult['year_of_join']);?>">
        <label>Class</label>
        <input class="span1" type="text" placeholder="Std" name="std" value="<?php echo ($getResult['standard']);?>">
        <input class="span1" type="text" placeholder="Div" name="div" value="<?php echo ($getResult['division']);?>">

            <input type="hidden" name="create-edit" value="<?php echo $id; ?>"/>
        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <a class="btn" href="<?php echo $url;?>" type="button">Cancel</a>
        </div>
        <?php }?>
    </form>
</div>