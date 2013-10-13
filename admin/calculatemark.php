<?php
//require_once('admin-layouts/admin-header.php');
include("admin-layouts/admin-header.php");
?>

<?php
    $result = null;
    if ($_POST['btn-Search']=='search' && !empty($_POST['searchText'])) {
        $searchText = $_POST['searchText'];
        $sql_select_form_students = "SELECT * FROM student where admissionNo = '$searchText'";
        $result = mysql_query($sql_select_form_students) or die ('Error reading Db: ' . mysql_error());

    }
?>

<div class="tab-content">

    <div class="tabbable">
        <!--<ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" id="#tab1" data-toggle="tab">Views</a></li>
        </ul>-->
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">

                <div class="content-box">
                    <div class="content-box-header">
                        <h3 class="c-head">Search</h3>
                        <div class="clear"></div>
                    </div>
                    <div class="content-box-content">
                        <form class="form-search pull-right" method="post" >
                            <div class="input-append">
                                <input type="text" class="span4 search-query" name="searchText">
                                <button type="submit" class="btn search-query-btn" name="btn-Search" value="search">Search</button>
                            </div>
                        </form>
                        <div class="article-content pgBox">
                            
                            <?php if(!empty($result)):
                                $getResult = mysql_fetch_array($result);
																
                                ?>
								
							<h3 class="clearfix"><span class="fl">Searched Information</span></h3>
                            <form class="form-horizontal frmMarkSheet" method="post" target="_blank" action="marksheetPdf.php" >
                            <article class="box-profile clearfix">
                                <div class="control-group">
                                    <label for="inputEmail" class="control-label">Admission No:</label>
                                    <div class="controls">
                                        <div class="frm-line"><?php echo $getResult['admissionNo'];?></div>
                                        <input type="hidden" name="admNo" value="<?php echo $getResult['admissionNo'];?>"/>
                                    </div>
                                </div>
                                <div class="form-left fl">
                                    <div class="control-group">
                                        <label for="inputEmail" class="control-label">First Name*</label>
                                        <div class="controls">
                                            <div class="frm-line"><?php echo $getResult['first_name'];?></div>
                                            <input type="hidden" name="studName" value="<?php echo $getResult['first_name'].' '.$getResult['last_name'];?>"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="inputEmail" class="control-label">Last Name</label>
                                        <div class="controls">
                                            <div class="frm-line"><?php echo $getResult['last_name'];?></div>
                                        </div>
                                    </div>
                                    <div class="control-group ">
                                        <label for="inputEmail" class="control-label">Gender</label>
                                        <div class="controls">
                                            <div class="frm-line"><?php echo $getResult['gender'];?></div>
                                        </div>
                                    </div>
                                    <div class="control-group ">
                                        <label for="inputEmail" class="control-label">Date Of Birth</label>
                                        <div class="controls">
                                            <div class="frm-line"><?php echo $getResult['dob'];?></div>
                                            <input type="hidden" name="dob" value="<?php echo $getResult['dob'];?>"/>
                                        </div>
                                    </div>
                                    <div class="control-group ">
                                        <label for="inputEmail" class="control-label">blood group</label>
                                        <div class="controls">
                                            <div class="frm-line"><?php echo $getResult['bloodgroup'];?></div>
                                        </div>
                                    </div>
                                    <div class="control-group ">
                                        <label for="inputEmail" class="control-label">Guardian/Parent Name</label>
                                        <div class="controls">
                                            <div class="frm-line"><?php echo $getResult['guardianFname'].' '.$getResult['guardianLname'];?></div>
                                            <input type="hidden" name="guardianName" value="<?php echo $getResult['guardianFname'].' '.$getResult['guardianLname'];?>"/>

                                        </div>
                                    </div>
                                    <div class="control-group ">
                                        <label for="inputEmail" class="control-label">Occupation</label>
                                        <div class="controls">
                                            <div class="frm-line"><?php echo $getResult['occupation']?></div>
                                        </div>
                                    </div>
                                    <div class="control-group ">
                                        <label for="inputEmail" class="control-label">Permanent Address</label>
                                        <div class="controls">
                                            <div class="frm-line"><?php echo $getResult['permanent_address']?></div>
                                        </div>
                                    </div>
                                    <div class="control-group ">
                                        <label for="inputEmail" class="control-label">Current Address</label>
                                        <div class="controls">
                                            <div class="frm-line"><?php echo $getResult['pcurrent_address'];?></div>
                                        </div>
                                    </div>
                                    <div class="control-group ">
                                        <label for="inputEmail" class="control-label">Contact Number</label>
                                        <div class="controls">
                                            <div class="frm-line"><?php echo $getResult['telephone'];?></div>
                                            <div class="frm-line"><?php echo $getResult['mobile'];?></div>
                                        </div>
                                    </div>
                                    <div class="control-group ">
                                        <label for="inputEmail" class="control-label">Year Of Joining</label>
                                        <div class="controls">
                                            <div class="frm-line"><?php echo $getResult['year_of_join'];?></div>
                                        </div>
                                    </div>
                                    <div class="control-group ">
                                        <label for="inputEmail" class="control-label">Standard & Division</label>
                                        <div class="controls">
                                            <div class="frm-line"><?php echo $getResult['standard'].' '.$getResult['division'];?></div>
                                        </div>
                                    </div>
                                    <div class="control-group ">
                                        <label for="inputEmail" class="control-label">Mark FA1*</label>
                                        <div class="controls">
                                            <input type="text" value="<?php echo $getResult['fa1'];?>" name="fa1">
                                        </div>
                                    </div>
                                    <div class="control-group ">
                                        <label for="inputEmail" class="control-label">Mark FA2*</label>
                                        <div class="controls">
                                            <input type="email" value="<?php echo $getResult['fa2'];?>" name="fa2">
                                        </div>
                                    </div>
                                    <div class="control-group ">
                                        <label for="inputEmail" class="control-label">Mark FA3*</label>
                                        <div class="controls">
                                            <input type="email" value="<?php echo $getResult['fa3'];?>" name="fa3">
                                        </div>
                                    </div>
                                    <div class="control-group ">
                                        <label for="inputEmail" class="control-label">Grand Total</label>
                                        <div class="controls">
                                            <div class="frm-line"><?php echo $getResult['grandTotal'];?></div>
                                        </div>
                                    </div>
                                    <div class="control-group ">
                                        <label for="inputEmail" class="control-label">Grade</label>
                                        <div class="controls">
                                            <div class="frm-line"><?php echo $getResult['grade'];?></div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" class="btn btn-success"> <i class="icon-align-justify"> </i> Calculate</button>
                                            <a class="btn marksheet" type="button"><i class="icon-print"> </i>  Marksheet</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="pgBox aRight">
                                    <span class="required-info">* required fields</span>
                                </div>
                            </article>
                            </form>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    $(function(){
        $('.marksheet').on('click', function(){
             //target="_blank"
           // $('.frmMarkSheet').attr('action','marksheetPdf.php')
            $('.frmMarkSheet').submit(/*function(){
                *//*$(this).attr('action', '/marksheetPdf.php');
                $(this).attr('target', '_blank');*//*
            }*/);
        })
    });
</script>

<?php require_once('admin-layouts/admin-footers.php'); ?>