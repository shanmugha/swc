<?php 
//require_once('admin-layouts/admin-header.php'); 
include("admin-layouts/admin-header.php");
?>


<?php
$romans = array('I','II','III','IV','V','VI','VII','VIII','XI','X');
if (!empty($_POST)) {
    $firstName     = $_POST['firstname'];
    $lastName      = $_POST['lastname'];
    $gender        = $_POST['gender'];
    $dob           = $_POST['dob'];
    $bloodGrp      = $_POST['bloodGrp'];
    $guardianFname = $_POST['gFname'];
    $guardianLname = $_POST['gLname'];
    $occupation    = $_POST['occupation'];
    $permanentAddress  = $_POST['pAdress'];
    $currentAddress    = $_POST['cAddress'];
    $telNumber         = $_POST['telNumber'];
    $mobNumber         = $_POST['mobNumber'];
    $admissionNumber   = $_POST['adNo'];
    $yearOfJoining     = $_POST['yearofJoin'];
    $standard          = $_POST['std'];
    $division          = $_POST['div'];

    $createOrEdit = $_POST['create-edit'];

//print_r($_POST);die;
    if (!empty($firstName)):
        if($createOrEdit == 0){
            $sql = "insert into student values ('','$admissionNumber','$firstName','$lastname','$gender','$dob','$bloodGrp',
                    '$guardianFname','$guardianLname','$occupation','$permanentAddress','$currentAddress',
                    '$telNumber','$mobNumber','$yearOfJoining','$standard','$division', null,null,null,null,null
                    )";
        } else {

            $sql = "UPDATE student SET admissionNo = '$admissionNumber', first_name = '$firstName',last_name = '$lastName',gender = '$gender',
                        dob = '$dob',bloodgroup = '$bloodGrp',guardianFname = '$guardianFname',guardianLname = '$guardianLname',
                        occupation = '$occupation',permanent_address =  '$permanentAddress',current_address = '$currentAddress',
                        telephone = '$telNumber', mobile = '$mobNumber',year_of_join = '$yearOfJoining',
                        standard = '$standard',division = '$division'
                        where id='$createOrEdit'";
        }

        $result = mysql_query($sql) or die ('Error updating database: ' . mysql_error());
        if ($result) {

        }
    endif;
}
?>

<script>
    $(document).ready(function()
        {
            $("#myTable").tablesorter();
        }
    );
    $(function(){
        $('.edit').on('click', function(){

            $.ajax({
                type: "POST",
                url: "student-edit.php",
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
                        url: "student-delete.php",
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
    <li class="active"><a href="#tab1" data-toggle="tab">Views</a></li>
    <li><a href="#tab2" class="tab2-form" data-toggle="tab">Forms</a></li>
</ul>
<div class="tab-content">
    <div class="tab-pane active" id="tab1">

        <div class="content-box">
            <div class="content-box-header">
                <h3 class="c-head">Students</h3>

                <div class="clear"></div>
            </div>
            <div class="content-box-content">
                <div class="notification attention png_bg">
                </div>
                <table id="myTable" class=" table table-bordered tablesorter">
                    <thead>
                    <tr>
                        <th><input class="check-all" type="checkbox"/></th>
                        <th>Sl No</th>
                        <th>Role No</th>
                        <th>Name of the Student</th>
                        <th>Gender</th>
                        <th>Blood Group</th>
                        <th>Date of Birth</th>
                        <th>Guardian Name</th>
                        <th>Occupation</th>
                        <th>Telephone</th>
                        <th>Mobile</th>
                        <th>Class</th>
                        <th>Division</th>
                        <th>Year of Join</th>
                        <th>Mark FA1</th>
                        <th>Mark FA2</th>
                        <th>Mark FA3</th>
                        <th>Grand Total</th>
                        <th>Grade</th>
                        <th> Edit / Delete</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $sql_select_form_school = "SELECT * FROM student";
                    $result = mysql_query($sql_select_form_school) or die ('Error updating database: ' . mysql_error());
                    ?>
                    <?php
                    if($result) {
                    while ($row = mysql_fetch_array($result)):?>
                    <tr>
                        <td><input type="checkbox"/></td>
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['admissionNo'];?></td>
                        <td><a title="title" href="#"><?php echo $row['first_name'].' '.$row['last_name'];?></a></td>
                        <td><?php echo $row['gender'];?></td>
                        <td><?php echo $row['bloodgroup'];?></td>
                        <td><?php echo $row['dob'];?></td>
                        <td><?php echo $row['guardianFname'].' '.$row['guardianLname'];?></td>
                        <td><?php echo $row['occupation'];?></td>
                        <td><?php echo $row['telephone'];?></td>
                        <td><?php echo $row['mobile'];?></td>
                        <td><?php echo $row['standard'];?></td>
                        <td><?php echo $row['division'];?></td>
                        <td><?php echo $row['year_of_join'];?></td>
                        <td><?php echo $row['fa1'];?></td>
                        <td><?php echo $row['fa2'];?></td>
                        <td><?php echo $row['fa3'];?></td>
                        <td><?php echo $row['grandTotal'];?></td>
                        <td><?php echo $row['grade'];?></td>

                        <td>
                            <a title="Edit" href="#" class="edit" rowId="<?php echo $row['id'];?>"><i class="icon-edit"></i></a>
                            <a title="Delete" href="#" class="delBtn" rowId="<?php echo $row['id'];?>"><i class="icon-trash"></i></a>

                        </td>
                    </tr>
                    <?php endwhile;} ?>
                    </tbody>
                </table>


                    <div class="bulk-actions align-left">
                        <select class="no-mrg" name="dropdown">
                            <option value="option1">Choose an action...</option>
                            <option value="option2">Edit</option>
                            <option value="option3">Delete</option>
                        </select>
                        <a href="#" class="btn btn-info">Apply to selected</a>
                    </div>



                <div class="pagination">
                    <ul>
                        <li><a href="#">Prev</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="tab2">
        <div class="content-box formcontent">
            <div class="content-box-header">
                <h3 class="c-head">Students</h3>

                <div class="clear"></div>
            </div>
            <div class="content-box-content">
                <form class="form-fill" method="post">
                    <label>Admission No</label>
                    <input class="span1" type="text" name="adNo">
                    <label>Name of the Student</label>
                    <input type="text" placeholder="First Name" name="firstname">
                    <input type="text" placeholder="Last Name" name="lastname">
                    <label>Gender</label>
                    <select class="span2" name="gender">
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                    <label>Date Of Birth</label>
                    <input type="text" placeholder="DD/MM/YYY" name="dob">
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
                    <input type="text" placeholder="First Name" name="gFname">
                    <input type="text" placeholder="Last Name" name="gLname">
                    <label>Occupation</label>
                    <input type="text" name="occupation">
                    <label>Address</label>
                    <textarea rows="3" placeholder="Permanent Address" name="pAdress"></textarea>
                    <textarea rows="3" placeholder="Current Address" name="cAddress"></textarea>
                    <label>Contact Number</label>
                    <input type="text" placeholder="Telephone Number" name="telNumber">
                    <input type="text" placeholder="Mobile Number" name="mobNumber">

                    <label>Year of joining</label>
                    <input type="text" placeholder="DD/MM/YYY" name="yearofJoin">
                    <label>Class</label>
                    <!--<input class="span1" type="text" placeholder="Std" name="std">-->
                    <select class="span2" name="std">
                        <?php foreach($romans as $roman) {?>
                            <option><?php echo $roman?></option>
                        <?php } ?>
                    </select>
                    <input class="span1" type="text" placeholder="Div" name="div">

                   <!-- <label>Last Eaxame Total Mark</label>
                    <label>Subjects Studied upto</label>
                    <input class="span2" type="text" placeholder="Maths" name="maths">
                    <input class="span2" type="text" placeholder="English / Languge" name="english">
                    <input class="span2" type="text" placeholder="Social Studies" name="ss">
                    <input class="span2" type="text" placeholder="Science" name="science">
                    <label>Previous school</label>
                    <input type="text" name="prevSchool">
                    <label>Type of Disability, if any</label>
                    <textarea rows="3" name="anyDisability"></textarea>
                    <label>Any Reservation</label>
                    <select class="span1" name="anyReservation">
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                    <label>Sports/Arts achievements</label>
                    <textarea name="achivements"></textarea>-->
                    <input type="hidden" name="create-edit" value="0"/>
                    <div class="form-actions">
                        <button class="btn btn-primary" type="submit">Save changes</button>
                        <a class="btn" href="/admin/students.php" type="button">Cancel</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
</div>
</div>
<?php require_once('admin-layouts/admin-footers.php'); ?>

