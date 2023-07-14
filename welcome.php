<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

//message variable
$result = '';

if (isset($_GET['k']))
    $result = $_GET['k'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<center>

    <body>
        <div class="page-header">
            <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["name"]); ?></b>. Welcome to our site.</h1>
        </div>

        <span class="help-block"><?php echo $result; ?></span>

        <div class="contents">
            <!-- add a php condition to show this student details if he/she is already in database -->
            <div class="row panel panel-success">

                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">

                            <div class="row">
                                <div class="col-lg-3 col-md-3">
                                    <center>
                                        <span class="text-left">
                                            <img src="https://lh5.googleusercontent.com/proxy/EkYugv9KzLUfAIpv-P4g6b0_mKxhcsfTvNmVueDn6XDHQp_SA0_hG2YFVAwB0Lbj_S-LrT-OtYsvxXMCrkZZMCmBfwelTQaAZW6GZwMQ8bRLwEvZonc0k0NxUpkhLBDuApx25K735rZfyHCIqA1RVpSdU84HF7U-j3xAwt3XLevAJtr5pwaVnRUC=w120-h120" class="img-responsive img-thumbnail">


                                            <!-- Modal -->
                                            <div class="modal fade" id="PhotoOption" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog" style="width:30%;height:30%;">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h4 class="modal-title text-success" id="myModalLabel"><i class="fa fa-gear"></i> <span class="text-right">Viddhyut Mall</span></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <center><img src="upload/profile_pic/701b4263f7d38604699b7c1f89a3e6a6.jpg" class="img-responsive img-thumbnail"></center>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="upload/upload-view.php?id=68" class="btn btn-success"><i class="fa fa-photo"></i> Upload</a>
                                                            <a href="upload/upload-view.php?id=68&amp;name=Viddhyut Mall&amp;src=view" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                        </span>
                                    </center>

                                </div>
                                <div class="col-lg-9 col-md-9">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#Summery" class="text-success"><i class="fa fa-indent"></i> Summery</a></li>
                                        <li><a data-toggle="tab" href="#Contact" class="text-success"><i class="fa fa-bookmark-o"></i> Contact Info</a></li>
                                        <li><a data-toggle="tab" href="#Address" class="text-success"><i class="fa fa-home"></i> Address</a></li>
                                        <li><a data-toggle="tab" href="#General" class="text-success"><i class="fa fa-info"></i> General Info</a></li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="Summery" class="tab-pane fade in active">

                                            <div class="table-responsive panel">
                                                <table class="table">
                                                    <tbody>

                                                        <tr>
                                                            <td class="text-success"><i class="fa fa-user"></i> Full Name</td>
                                                            <td>Viddhyut Mall</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success"><i class="fa fa-list-ol"></i> Scholar Number</td>
                                                            <td>45</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success"><i class="fa fa-book"></i> Medium</td>
                                                            <td>English</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success"><i class="fa fa-group"></i> Class &amp; Section</td>
                                                            <td>12-F</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success"><i class="fa fa-calendar"></i> Birthday</td>
                                                            <td>December 2, 2011</td>
                                                        </tr>

                                                        <tr>
                                                            <td class="text-success"><i class="fa fa-university"></i> School</td>
                                                            <td>
                                                                Shyama Mall Girls Inter College </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div id="Address" class="tab-pane fade">
                                            <div class="table-responsive panel">
                                                <table class="table">
                                                    <tbody>

                                                        <tr>
                                                            <td class="text-success"><i class="fa fa-home"></i> Address</td>
                                                            <td>
                                                                <address>
                                                                    <strong>
                                                                        C-***, Amahiya </strong><br>
                                                                    Kharobar, ****** <br>
                                                                    Gorakhpur, Utter Pradesh, India<br>
                                                                </address>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div id="Contact" class="tab-pane fade">
                                            <div class="table-responsive panel">
                                                <table class="table">
                                                    <tbody>

                                                        <tr>
                                                            <td class="text-success"><i class="fa fa-envelope-o"></i> Email ID</td>
                                                            <td><a href="mailto:****@pawanmall.net?subject=Email from &amp;body=Hello, Viddhyut Mall">****@pawanmall.net</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success"><i class="glyphicon glyphicon-phone"></i> Mobile Number</td>
                                                            <td>88********</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success"><i class="fa fa-flag"></i> Nationality</td>
                                                            <td>Indian</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success"><i class="fa fa-user"></i> Father's Name</td>
                                                            <td>Ajay Mall</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success"><i class="glyphicon glyphicon-phone"></i> Father's Mobile</td>
                                                            <td>+91 99********</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success"><i class="fa fa-user"></i> Mother's Name</td>
                                                            <td>Hemlata Mall</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success"><i class="glyphicon glyphicon-phone"></i> Mother's Mobile</td>
                                                            <td>+91 90********</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success"><i class="fa fa-user"></i> Emergency Contact Person</td>
                                                            <td>Pawan Mall</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success"><i class="glyphicon glyphicon-phone"></i> Emergency Contact Person's Mobile</td>
                                                            <td>+91 88********</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div id="General" class="tab-pane fade">
                                            <div class="table-responsive panel">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-success"><i class="fa fa-university"></i> Last School</td>
                                                            <td>Pawan Mall's School</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success"><i class="fa fa-calendar"></i> Date of Admission</td>
                                                            <td>March 4, 2009</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success"><i class="fa fa-home"></i> Birth Place</td>
                                                            <td>Delhi</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success"><i class="fa fa-calendar"></i> Academic Year</td>
                                                            <td>2015-2016</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success"><i class="fa fa-medkit"></i> Medical Condition</td>
                                                            <td>Normal</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success"><i class="fa fa-thumbs-up"></i> Active/Inactive</td>
                                                            <td>Student is Active</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success"><i class="glyphicon glyphicon-time"></i> Last Editing</td>
                                                            <td>2015-08-20 09:41:56</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.table-responsive -->

                </div>
            </div>
            <div class="actions">
                <h2>Actions</h2>
                <!-- Admission -->
                <div class="dropdown">
                    <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown">Admissions
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="admission.php?class=10" class="btn btn-primary">Class 10</a></li>
                        <li><a href="admission.php?class=9" class="btn btn-primary">Class 9</a></li>
                        <li><a href="admission.php?class=8" class="btn btn-primary">Class 8</a></li>
                    </ul>
                </div>

                <!-- Time table -->
                <div class="dropdown">
                    <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown">Time-table
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#" class="btn btn-primary">Class 10</a></li>
                        <li><a href="#" class="btn btn-primary">Class 9</a></li>
                        <li><a href="#" class="btn btn-primary">Class 8</a></li>
                    </ul>
                </div>

                <!-- Admit card -->
                <div class="dropdown">
                    <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown">Admit Card
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#" class="btn btn-primary">Class 10</a></li>
                        <li><a href="#" class="btn btn-primary">Class 9</a></li>
                        <li><a href="#" class="btn btn-primary">Class 8</a></li>
                    </ul>
                </div>

                <!-- Results -->
                <div class="dropdown">
                    <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown">Results
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#" class="btn btn-primary">Class 10</a></li>
                        <li><a href="#" class="btn btn-primary">Class 9</a></li>
                        <li><a href="#" class="btn btn-primary">Class 8</a></li>
                    </ul>
                </div>

                <p>
                    <a href="reset-password.php" class="btn btn-success">Reset Your Password</a>
                    <a href="logout.php" class="btn btn-info">Sign Out of Your Account</a>
                </p>
            </div>
        </div>
    </body>
</center>

</html>