<div class="content-box-header">
    <h3 class="c-head">Teachers</h3>
    <div class="clear"></div>
</div>
<div class="content-box-content">
    <?php
   // require_once(__DIR__ . '/../config/connection.php');
    include(dirname(__FILE__)."/../config/connection.php");
    $connect = new Connection();
    $id = $_POST['id'];
    $sql_select_form_school = "SELECT * FROM teacher where id = '$id'";
    $result = mysql_query($sql_select_form_school) or die ('Error updating database: ' . mysql_error());
    ?>
    <form class="form-fill" method="post">
        <?php if($result) {
            $getResult = mysql_fetch_row($result)
            ?>
        <label>Teacher's Code</label>
        <input type="text" placeholder="Teachers Code" name="teachercode" value="<?php echo $getResult[1];?>" required>
        <label>Name of the teacher</label>
        <input type="text" placeholder="First Name" name="firstname" value="<?php echo $getResult[2];?>">
        <input type="text" placeholder="Last Name" name="lastname" value="<?php echo $getResult[3];?>">

        <label>Gender</label>
        <select class="span2" name="gender" value="<?php echo $getResult[4];?>">
            <option value="Male"<?php if($getResult[4] == 'Male'){?>selected=<?php echo 'selected'; }?> >Male</option>
            <option value="Female"<?php if($getResult[4] == 'Female'){?>selected=<?php echo 'selected'; }?> >Female</option>
        </select>
        <label>Date Of Birth</label>
        <input type="text" placeholder="DD/MM/YYY" name="dob" value="<?php echo $getResult[5];?>">

        <label>Education Qualification</label>
        <select multiple="multiple" name="qualification">
            <option <?php if($getResult[6] == 'BA'){?>selected=<?php echo 'selected'; }?>>BA</option>
            <option <?php if($getResult[6] == 'MA'){?>selected=<?php echo 'selected'; }?>>MA</option>
            <option <?php if($getResult[6] == 'BSC'){?>selected=<?php echo 'selected'; }?>>Bsc</option>
            <option <?php if($getResult[6] == 'MSC'){?>selected=<?php echo 'selected'; }?>>MSC</option>
        </select>
        <label>Subject</label>
        <input class="span3" type="text" placeholder="Subject" name="subject" value="<?php echo $getResult[7];?>">

        <label>Type of Teacher</label>
        <select  name="teacherType">
            <option>Regular</option>
        </select>
        <label>Year of joining in present service</label>
        <input type="text" placeholder="DD/MM/YYY" name="yearOfJoining" value="<?php echo $getResult[9];?>">
        <label>Subject Taught</label>
        <input class="span3" type="text" placeholder="Subject taught" name="subjectTaught" value="<?php echo $getResult[10];?>">

        <label>Salary</label>
        <input class="span2" type="text" placeholder="Salary" name="salary" value="<?php echo $getResult[11];?>">
        <?php }?>

        <input type="hidden" name="create-edit" value="<?php echo $id; ?>"/>
        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <button class="btn" type="button">Cancel</button>
        </div>
    </form>
</div>