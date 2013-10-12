<?php
//require_once('admin-layouts/admin-header.php');
include("admin-layouts/admin-header.php");
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
                        <form class="form-search pull-right">
                            <div class="input-append">
                                <input type="text" class="span4 search-query">
                                <button type="submit" class="btn search-query-btn">Search</button>
                            </div>
                        </form>
                        <div class="article-content pgBox">
                            <h3 class="clearfix">
                                <span class="fl">Searched Information</span>
                            </h3>
                            <form class="form-horizontal">
                            <article class="box-profile clearfix">
                                <div class="form-left fl">
                                    <div class="control-group">
                                        <label for="inputEmail" class="control-label">First Name*</label>
                                        <div class="controls">
                                            <div class="frm-line">Reshman</div>
                                        </div>
                                    </div>
                                    <div class="control-group ">
                                        <label for="inputEmail" class="control-label">Surname *</label>
                                        <div class="controls">
                                            <input type="text" value="Admin" name="surname">                                                                            </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="inputEmail" class="control-label">Nickname </label>
                                        <div class="controls">
                                            <input type="text" value="" name="nickname">                                                                            </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="inputEmail" class="control-label">Job Title</label>
                                        <div class="controls">
                                            <input type="text" value="SuperAdmin" name="jobtitle">                                                                            </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="inputEmail" class="control-label">Department *</label>
                                        <div class="controls">
                                            <input type="text" value="Admin" name="department">                                                                            </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="inputEmail" class="control-label">Office Location</label>
                                        <div class="controls">
                                            <input type="text" value="" name="officelocation">                                                                            </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="inputEmail" class="control-label">Workphone *</label>
                                        <div class="controls">
                                            <input type="text" value="" name="workphone">                                                                            </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="inputEmail" class="control-label">Work Email</label>
                                        <div class="controls">
                                            <input type="email" value="superadmin@villagehive.com" name="workemail">                                                                            </div>
                                    </div>
                                </div>

                                <div class="pgBox aRight">
                                    <span class="required-info">* required fields</span>
                                </div>
                            </article>
                            </form>
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
        $('.search-query-btn').on('click', function(){
            alert('df');
        })
    });
</script>

<?php require_once('admin-layouts/admin-footers.php'); ?>