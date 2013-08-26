<?php 

//require_once('admin-layouts/admin-header.php'); 
include("admin-layouts/admin-header.php");

?>

    <div class="tab-content">
        <h2>Welcome Admin</h2>

        <div class="tabbable">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab">Views</a></li>
                <li><a href="#tab2" data-toggle="tab">Forms</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab1">

                    <div class="content-box">
                        <div class="content-box-header">
                            <h3 class="c-head">Management</h3>

                            <div class="clear"></div>
                        </div>
                        <div class="content-box-content">
                            <div class="notification attention png_bg">
                            </div>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th><input class="check-all" type="checkbox"/></th>
                                    <th>Sl No</th>
                                    <th>Member Code</th>
                                    <th>Name of the Member</th>
                                    <th>Gander</th>
                                    <th>Date of Birth</th>
                                    <th>Category</th>
                                    <th>Year of Join</th>
                                    <th> Edit / Delete</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <td colspan="6">
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
                                    </td>
                                </tr>
                                </tfoot>

                                <tbody>
                                <tr>
                                    <td><input type="checkbox"/></td>
                                    <td>1</td>
                                    <td>353</td>
                                    <td><a title="title" href="#">Mr.Aravind</a></td>
                                    <td>Male</td>
                                    <td>03/02/1980</td>
                                    <td>6</td>
                                    <td>2004</td>
                                    <td>
                                        <a title="Edit" href="#"><i class="icon-edit"></i></a>
                                        <a title="Delete" href="#"><i class="icon-trash"></i></a>

                                    </td>
                                </tr>

                                <tr>
                                    <td><input type="checkbox"/></td>
                                    <td>2</td>
                                    <td>223</td>
                                    <td><a title="title" href="#">Mr.Jhone</a></td>
                                    <td>Male</td>
                                    <td>03/02/1978</td>
                                    <td>6</td>
                                    <td>2000</td>
                                    <td>
                                        <a title="Edit" href="#"><i class="icon-edit"></i></a>
                                        <a title="Delete" href="#"><i class="icon-trash"></i></a>

                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"/></td>
                                    <td>1</td>
                                    <td>353</td>
                                    <td><a title="title" href="#">Mr.Aravind</a></td>
                                    <td>Male</td>
                                    <td>03/02/1980</td>
                                    <td>6</td>
                                    <td>2004</td>
                                    <td>
                                        <a title="Edit" href="#"><i class="icon-edit"></i></a>
                                        <a title="Delete" href="#"><i class="icon-trash"></i></a>

                                    </td>
                                </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab2">
                    <div class="content-box">
                        <div class="content-box-header">
                            <h3 class="c-head">Teachers</h3>

                            <div class="clear"></div>
                        </div>
                        <div class="content-box-content">
                            <form class="form-fill">
                                <label>Name of the Member</label>
                                <input type="text" placeholder="First Name">
                                <input type="text" placeholder="Last Name">
                                <label>Gender</label>
                                <select class="span2">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                                <label>Date Of Birth</label>
                                <input type="text" placeholder="DD/MM/YYY">
                                <label>Education Qulification</label>
                                <select multiple="multiple">
                                    <option>BA</option>
                                    <option>MA</option>
                                    <option>Bsc</option>
                                    <option>MSC</option>
                                </select>
                                <label>Address</label>
                                <textarea rows="3" placeholder="Permanent Address"></textarea>
                                <textarea rows="3" placeholder="Current Address"></textarea>
                                <label>Contact Number</label>
                                <input type="text" placeholder="Telephone Number">
                                <input type="text" placeholder="Mobile Number">
                                <label>Category</label>
                                <input class="span1" type="text">
                                <label>Year of joining in present servic</label>
                                <input type="text" placeholder="DD/MM/YYY">

                                <div class="form-actions">
                                    <button class="btn btn-primary" type="submit">Save changes</button>
                                    <button class="btn" type="button">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php require_once('admin-layouts/admin-footers.php'); ?>