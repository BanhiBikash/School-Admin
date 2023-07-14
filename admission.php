<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

require_once('config.php');

//variables
$class = $result = $fname = $mname = $lname = $mother = $father = $guardian = $dob = $city = $state = $pin = $address = $file = "";
$fname_err = $lname_err = $dob_err = $mother_err = $father_err = $guardian_err = $city_err = $state_err = $pin_err = $address_err = $file_err = "";

if (isset($_GET['class'])) {
    $class = $_GET['class'];
}

if (isset($_POST['submit'])) {
    //first name
    if (empty(trim($_POST['fname']))) {
        $fname_err = "Enter your first name.";
    } else {
        $fname = $_POST['fname'];
    }

    //middle name
    if (empty(trim($_POST['fname']))) {
        $mname = "";
    } else {
        $mname = $_POST['mname'];
    }

    //lname
    if (empty(trim($_POST['lname']))) {
        $fname_err = "Enter your last name.";
    } else {
        $fname = $_POST['lname'];
    }

    //dob
    if (empty(trim($_POST['dob']))) {
        $dob_err = "Enter your date of birth.";
    } else {
        $dob = $_POST['dob'];
    }

    //father
    if (empty(trim($_POST['father']))) {
        $father_err = "Enter your father's name.";
    } else {
        $father = $_POST['father'];
    }

    //mother
    if (empty(trim($_POST['mother']))) {
        $mother_err = "Enter your mother's name.";
    } else {
        $mother = $_POST['mother'];
    }

    //guardian
    if (empty(trim($_POST['guardian']))) {
        $guardian_err = "Enter your guardain's name.";
    } else {
        $guardian = $_POST['guardian'];
    }

    //city
    if (empty(trim($_POST['city']))) {
        $city_err = "Enter your city.";
    } else {
        $city = $_POST['city'];
    }

    //state
    if (empty(trim($_POST['state']))) {
        $state_err = "Enter your state.";
    } else {
        $state = $_POST['state'];
    }

    //pin
    if (empty(trim($_POST['pin']))) {
        $pin_err = "Enter your pin.";
    } else {
        $pin = $_POST['pin'];
    }

    //address
    if (empty(trim($_POST['address']))) {
        $address_err = "Enter your address.";
    } else {
        $address = $_POST['address'];
    }

    //file
    if (empty(trim($_FILES['file']['name']))) {
        $file_err = "Enter your image.";
    } else {
        $file = $_FILES['file']['name'];
    }

    if (empty($fname_err) && empty($lname_err) && empty($father_err) && empty($mother_err) && empty($guardian_err) && empty($city_err) && empty($state_err)  && empty($pin_err) && empty($address_err) && empty($file_err)) {
        $email = $_SESSION["email"];

        $sql = "SELECT * FROM `tbl_admissions` WHERE `email` = '$email'";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        //email already used
        if (mysqli_stmt_num_rows($stmt) == 1) {
            $result="Student already applied through this email.";
        }

        //email can be used
        else if(mysqli_stmt_num_rows($stmt) == 0)
        {
            $file = $_FILES["file"]["name"];
            $tempname = $_FILES["file"]["tmp_name"];      
            //when jpeg image is uploaded
            if($_FILES['file']['type']=='image/jpeg')
            {
                $source=imagecreatefromjpeg($tempname);
                $file=time().'.jpeg';
                imagejpeg($source,'Application Images/'.$file);
                $sql="INSERT INTO `tbl_admissions`(`email`, `fname`, `mname`, `lname`, `dob`, `mother`, `father`, `guardian`, `city`, `state`, `pin`, `address`, `pic`) VALUES ('$email','$fname','$mname','$lname','$dob','$mother','$father','$guardian','$city','$state','$pin','$address','$file')";

                //query execute
                $stmt=mysqli_query($conn,$sql);

                if($stmt)
                {
                    $result="Application successfully accepted.";
                }
        
                else{
                    $result=mysqli_error($conn);
                }
        
            }

            {
                $file_err="Please enter jpeg file format";
            }

        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Form</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>

    <form class="needs-validation" id="admission" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">

        <!-- heading -->
        <h2>Admission Form of class <?php echo $class ?></h2>

        <!-- personal data -->
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="validationCustom01">First name</label>
                <input type="text" class="form-control" id="validationCustom01" placeholder="First name" name="fname" value="<?php echo $fname ?>" required>
                <p class="error"><?php echo $fname_err ?></p>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom01">Middle name</label>
                <input type="text" class="form-control" id="validationCustom01" placeholder="Middle name (not compulsory)" name="mname" value="<?php echo $mname ?>">
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom02">Last name</label>
                <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" name="lname" value="<?php echo $lname ?>" required>
                <p class="error"><?php echo $lname_err ?></p>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom02">Date of birth</label>
                <input type="date" class="form-control" id="validationCustom02" placeholder="Your birth date" name="dob" value="<?php echo $dob ?>" required>
                <p class="error"><?php echo $dob_err ?></p>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom02">Mother's name</label>
                <input type="text" class="form-control" id="validationCustom02" placeholder="Mother's name" name="mother" value="<?php echo $mother ?>" required>
                <p class="error"><?php echo $mother_err ?></p>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom02">Father's name</label>
                <input type="text" class="form-control" id="validationCustom02" placeholder="Father's name" name="father" value="<?php echo $father ?>" required>
                <p class="error"><?php echo $father_err ?></p>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom02">Guardian's name</label>
                <input type="text" class="form-control" id="validationCustom02" placeholder="Guardian's name" name="guardian" value="<?php echo $guardian ?>" required>
                <p class="error"><?php echo $guardian_err ?></p>
            </div>
        </div>

        <!-- address -->
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationCustom03">City</label>
                <input type="text" class="form-control" id="validationCustom03" placeholder="City" name="city" value="<?php echo $city ?>" required>
                <p class="error"><?php echo $city_err ?></p>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationCustom04">State</label>
                <input type="text" class="form-control" id="validationCustom04" placeholder="State" name="state" value="<?php echo $state ?>" required>
                <p class="error"><?php echo $state_err ?></p>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationCustom05">Pin</label>
                <input type="text" class="form-control" id="validationCustom05" placeholder="Pin" name="pin" value="<?php echo $pin ?>" required>
                <p class="error"><?php echo $pin_err ?></p>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationCustom04">Address</label>
                <input type="text" class="form-control" id="validationCustom04" placeholder="Adderss" name="address" value="<?php echo $address ?>" required>
                <p class="error"><?php echo $address_err ?></p>
            </div>
        </div>

        <!-- digital details -->
        <div class="form-group">
            <div class="col-md-3 mb-3">
                <label for="exampleFormControlFile1">Upload Picture</label><br>
                <input type="file" class="form-control-file" name="file" id="exampleFormControlFile1">
                <p class="error"><?php echo $file_err ?></p>
            </div>
        </div>

        <!-- terms and conditions -->
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" name="terms" required>
                <label class="form-check-label" for="invalidCheck">
                    Agree to terms and conditions
                </label>
            </div>
        </div>

        <!-- buttons -->
        <button class="btn btn-primary" type="submit" name="submit">Submit form</button>
    </form>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

</body>

</html>