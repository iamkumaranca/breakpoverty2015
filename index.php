<?php
session_start();
if($_SESSION["logged-in"]) :
    include_once('./inc/php/header.php');
    include_once('./inc/php/navigation.php');

    $stmt = $dbh->prepare('SELECT * FROM `sms`;');
    $stmt->execute();
?>

            <div id="page-wrapper">
                <div class="row"><br />
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa fa-clock-o fa-fw"></i> Real Time Translation Requests
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>User Phone Number</th>
                                                <th>Requested Translation</th>
                                                <th>Translation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            while($row = $stmt->fetch()) {
                                                echo '<tr>';
                                                echo '<td>' . $row['sent_from'] . '</td>';
                                                echo '<td>' . $row['message'] . '</td>';
                                                echo '<td>translation goes here</td>';
                                                echo '</tr>';
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-8 -->
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bell fa-fw"></i> Most Popular Requests
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="list-group">
                                    <a href="#" class="list-group-item">

                                    </a>
                                    <a href="#" class="list-group-item">

                                    </a>
                                    <a href="#" class="list-group-item">

                                    </a>
                                    <a href="#" class="list-group-item">

                                    </a>
                                    <a href="#" class="list-group-item">

                                    </a>
                                    <a href="#" class="list-group-item">

                                    </a>
                                </div>
                                <!-- /.list-group -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-4 -->
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
