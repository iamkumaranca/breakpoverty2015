<?php
session_start();
if($_SESSION["logged-in"]) :
    include_once('./inc/php/header.php');
    include_once('./inc/php/navigation.php');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">New User Registration</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            User Profile
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form role="form" action="./inc/php/register.php" method="post">
                                    <?php $error = $_GET["error"]; ?>
                                    <?php if($error != '') : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <span class="fa fa-exclamation-circle" aria-hidden="true"></span>
                                        <span class="sr-only">Error:</span>
                                        <?php echo $error; ?>
                                    </div>
                                    <?php endif; ?>
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input class="form-control" type="text" name="first_name" placeholder="First Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input class="form-control"  type="text" name="last_name" placeholder="Last Name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input class="form-control" type="email" name="email" placeholder="Email Address" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Mobile Phone Number</label>
                                                <input class="form-control" type="tel" name="mobile_phone" placeholder="Mobile Phone Number" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input class="form-control" type="text" name="username" placeholder="Username" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Role on Site</label><br />
                                                <label class="radio-inline">
                                                    <input type="radio" name="site_role" id="site_role1" value="Principle" checked>Principle
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="site_role" id="site_role2" value="Teacher">Teacher
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="site_role" id="site_role3" value="Government Staff">Government Staff
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input class="form-control" type="password" name="password" placeholder="Password" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password" required>
                                            </div>
                                        </div>
                                    </div><div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <button type="submit" class="btn btn-default">Register User</button>
                                        </div>
                                        <div class="col-lg-6">
                                            <button type="reset" class="btn btn-default">Reset Form</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row (nested) -->
                            </form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php include_once('./inc/php/footer.php');
else :
    header("Location: http://kumaransathianathan.ca/breakpoverty2015/login.php?error=Please enter your credentials!");
    die();
endif;
?>
