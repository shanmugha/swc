<?php 
//require_once('admin-layouts/admin-header.php'); 
include("admin-layouts/admin-header.php");
$url = $connect->baseurl.'/admin/teachers.php';
?>

<?php

if (!empty($_POST)) {
    $teacherCode = $_POST['teachercode'];
    $firstName   = $_POST['firstname'];
    $lastName    = $_POST['lastname'];
    $gender      = $_POST['gender'];
    $dob         = $_POST['dob'];
    $educationQualification = $_POST['qualification'];
    $subject     = $_POST['subject'];
    $teacherType   = $_POST['teacherType'];
    $yearOfJoining = $_POST['yearOfJoining'];
    $subjectTaught = $_POST['subjectTaught'];
    $salary        = $_POST['salary'];
    $createOrEdit = $_POST['create-edit'];


    if (!empty($firstName)):
        if($createOrEdit == 0){
            $sql = "INSERT INTO teacher VALUES ('','$teacherCode', '$firstName','$lastName','$gender','$dob','$educationQualification',
                    '$subject','$teacherType','$yearOfJoining','$subjectTaught','$salary')";
            //echo $sql;die;
        } else {
            $sql = "UPDATE teacher SET teacher_code = '$teacherCode', firstname = '$firstName',lastName = '$lastName',
                       gender = '$gender', dob = '$dob', eduQualification = '$educationQualification',
                       subject = '$subject', teacher_type = '$teacherType',year_of_joining = '$yearOfJoining',
                       subject_taught = '$subjectTaught',salary = '$salary'  where id='$createOrEdit'";
        }
        $result = mysql_query($sql) or die ('Error updating database: ' . mysql_error());
        if ($result) {

        }
    endif;
}

?>
<script type="text/javascript">
    $(function(){
        $('.edit').on('click', function(){

            $.ajax({
                type: "POST",
                url: "teacher-edit.php",
                data: { id: $(this).attr('rowId') }
            }).done(function( data ) {
                    $('.tab2-form').trigger('click');
                    $('.formcontent').html(data);
                });
        });

        $('.delBtn').on('click', function(){
            if (confirm("Are you sure you want to delete this row?")) {
                $.ajax(
                    {
                        type: "POST",
                        url: "teacher-delete.php",
                        data: {id:$(this).attr('rowId')},
                        cache: false,
                        success: function()
                        {
                            location.reload();
                        }
                    });
            }
        })
    });
</script>
<div class="tab-content">
<h2>Welcome Admin</h2>
<div class="tabbable">
<ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" id="#tab1" data-toggle="tab">Views</a></li>
    <li><a href="#tab2" class="tab2-form" data-toggle="tab">Forms</a></li>
</ul>
<div class="tab-content">
    <div class="tab-pane active" id="tab1">

        <div class="content-box">
            <div class="content-box-header">
                <h3 class="c-head">Teachers</h3>
                <div class="clear"></div>
            </div>
            <div class="content-box-content">
                <div class="notification attention png_bg">
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>

                        <th>Teachers Code</th>
                        <th>Name of the Teacher</th>
                        <th>Gander</th>
                        <th>Date of Birth</th>
                        <th>Educational Qualification</th>
                        <th>Subject</th>
                        <th>Type of Teacher</th>
                        <th>Year of Join</th>
                        <th>Subject Taught</th>
                        <th>Salary</th>
                        <th>Edit/Delete</th>

                    </tr>
                    </thead>


                    <tbody>
                    <?php
                    $adjacents = 3;
                    $query = "SELECT COUNT(*) FROM teacher";
                    $total_items = mysql_fetch_array(mysql_query($query));

                    /* Setup vars for query. */
                    $targetpage = "";
                    $limit = 2; //how many items to show per page
                    if(isset($_GET['page'])) {
                        $page = $_GET['page'];
                        $start = ($page - 1) * $limit; //first item to display on this page
                    } else {
                        $page = 0;
                        $start = 0; //if no page var is given, set start to 0
                    }

                    if ($page == 0) $page = 1; //if no page var is given, default to 1.
                    $prev = $page - 1; //previous page is page - 1
                    $next = $page + 1; //next page is page + 1
                    $lastpage = ceil($total_items[0]/$limit); //lastpage is = total pages / items per page, rounded up.
                    $lpm1 = $lastpage - 1; //last page minus 1
                    ?>

                    <?php
                    $sql_select_form_school = "SELECT * FROM teacher LIMIT $start, $limit";
                    $result = mysql_query($sql_select_form_school) or die ('Error updating database: ' . mysql_error());
                    ?>
                    <?php
                    if($result) {
                        while ($row = mysql_fetch_row($result)):?>
                            <tr>
                                <td><?php echo $row[1];?></td>
                                <td><a title="title" href="#"><?php echo $row[2].' '.$row[3];?></a></td>
                                <td><?php echo $row[4];?></td>
                                <td><?php echo $row[5];?></td>
                                <td><?php echo $row[6];?></td>
                                <td><?php echo $row[7];?></td>
                                <td><?php echo $row[8];?></td>
                                <td><?php echo $row[9];?></td>
                                <td><?php echo $row[10];?></td>
                                <td><?php echo $row[11];?></td>
                                <td>
                                    <a title="Edit" href="#" class="edit" rowId="<?php echo $row[0];?>"><i class="icon-edit"></i></a>
                                    <a title="Delete" href="#" class="delBtn" rowId="<?php echo $row[0];?>"><i class="icon-trash"></i></a>

                                </td>
                            </tr>
                        <?php endwhile;} ?>
                    </tbody>
                </table>
                <?php include('pagination.php')?>
                <div class="clear"></div>
            </div>
        </div>
    </div>

    <div class="tab-pane" id="tab2">
        <div class="content-box formcontent">
            <div class="content-box-header">
                <h3 class="c-head">Teachers</h3>
                <div class="clear"></div>
            </div>
            <div class="content-box-content">
                <form class="form-fill" method="post">
                    <label>Teacher's Code</label>
                    <input type="number" min="0" data-validation-number-message="must be a number" placeholder="Teachers Code" id="teachercode" name="teachercode">
                    <label>Name of the teacher</label>
                    <input type="text" placeholder="First Name" name="firstname">
                    <input type="text" placeholder="Last Name" name="lastname">
                    <label>Gender</label>
                    <select class="span2" name="gender">
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                    <label>Date Of Birth</label>
                    <input type="text" placeholder="DD/MM/YYY" name="dob">
                    <label>Education Qualification</label>
                    <select multiple="multiple" name="qualification">
                        <option>BA</option>
                        <option>MA</option>
                        <option>Bsc</option>
                        <option>MSC</option>
                    </select>

                    <label>Subject</label>
                    <input class="span3" type="text" placeholder="Subject" name="subject">

                    <label>Type of Teacher</label>
                    <select  name="teacherType">
                        <option>Regular</option>
                    </select>
                    <label>Year of joining in present service</label>
                    <input type="text" placeholder="DD/MM/YYY" name="yearOfJoining">
                    <label>Subject Taught</label>
                    <input class="span3" type="text" placeholder="Subject taught" name="subjectTaught">

                    <label>Salary</label>
                    <input class="span2" type="text" placeholder="Salary" name="salary" id="salary">

                    <input type="hidden" name="create-edit" value="0"/>
                    <div class="form-actions">
                        <button class="btn btn-primary" type="submit">Save changes</button>
                        <a class="btn" href="<?php echo $url;?>" type="button">Cancel</a>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>
</div>
</div>

<?php require_once('admin-layouts/admin-footers.php'); ?>

<script>
    $(document).ready(function(){
        $.validator.addMethod(
            "indianDate",
            function(value, element) {
                // put your own logic here, this is just a (crappy) example
                return value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
            },
            "Please enter a date in the format dd/mm/yyyy."
        );

        $('#teachercode, #salary').on('keypress', function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            return !(charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57));
        });


        $(".form-fill").validate({

            // Specify the validation rules
            rules: {
                teachercode:"required",
                firstname:"required",
                dob: {
                    required: true,
                    indianDate: true
                },
                yearOfJoining: {
                    required: true,
                    indianDate: true
                }

            },

            // Specify the validation error messages
            messages: {

            },

            submitHandler: function(form) {
                form.submit();
            }
        });

    })
</script>
