<?php
require_once "../database/config.php";
$name = $address = $age = $major = $gender = "";
$name_err = $address_err = $age_err = $major_err = $gender_err = "";
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    error_log(print_r("Form Submitted", TRUE));
    $id = $_POST["id"];

    // Validate name
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $name_err = "Please enter a valid name.";
    } else {
        $name = $input_name;
    }

    // Validate address
    $input_address = trim($_POST["address"]);
    if (empty($input_address)) {
        $address_err = "Please enter an address.";
    } else {
        $address = $input_address;
    }

    // Validate age
    $input_age = trim($_POST["age"]);
    if (empty($input_age)) {
        $age_err = "Please enter the age.";
    } elseif (!ctype_digit($input_age)) {
        $salary_err = "Please enter a positive integer value.";
    } else {
        $age = $input_age;
    }

    // Validate major
    $input_major = trim($_POST["major"]);
    if (empty($input_major)) {
        $major_err = "Please select a Major.";
    } else {
        $major = $input_major;
    }

    // Validate gender
    $input_gender = trim($_POST["gender"]);
    if (empty($input_gender)) {
        $gender_err = "Please choose gender.";
    } else {
        $gender = $input_gender;
    }

    if (empty($name_err) && empty($address_err) && empty($age_err) && empty($major_err) && empty($gender_err)) {
        error_log(print_r("No Errror and ready to commit to DB", TRUE));
        $sql = "UPDATE student SET student_name=?, address=?, age=?,major=?, gender =? WHERE id=?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssissi", $param_name, $param_address, $param_age, $param_major, $param_gender, $param_id);
            $param_name = $name;
            $param_address = $address;
            $param_age = $age;
            $param_major = $major;
            $param_gender = $gender;
            $param_id = $id;
            $status = mysqli_stmt_execute($stmt);
            error_log(print_r("STATUS=" . $status, TRUE));
            if ($status) {
                error_log(print_r("Commit  Successfully", TRUE));
                header("location: ../index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($link);
} else {
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        $id =  trim($_GET["id"]);
        $sql = "SELECT * FROM student WHERE id = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            $param_id = $id;
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $name = $row["student_name"];
                    $address = $row["address"];
                    $age = $row["age"];
                    $major = $row["major"];
                    $gender = $row["gender"];
                } else {
                    header("location: ../error.php");
                    exit();
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    } else {
        header("location: error.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Student</title>
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 text-uppercase">Update Student</h2>
                    <p class="text-danger">Please edit the input values and submit to update the student record.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="POST">
                        <div class="form-group mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err; ?></span>
                        </div>
                        <div class="form-group mb-3">
                            <label>Address</label>
                            <textarea name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>"><?php echo $address; ?></textarea>
                            <span class="invalid-feedback"><?php echo $address_err; ?></span>
                        </div>
                        <div class="form-group mb-3">
                            <label>Age</label>
                            <input type="text" name="age" class="form-control <?php echo (!empty($age_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $age; ?>">
                            <span class="invalid-feedback"><?php echo $age_err; ?></span>
                        </div>
                        <div class="form-group mb-3">
                            <label>Major</label>
                            <input type="text" name="major" class="form-control <?php echo (!empty($major_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $major; ?>">
                            <span class="invalid-feedback"><?php echo $major_err; ?></span>
                        </div>
                        <div class="input-group form-group mb-3">
                            <select class="custom-select form-select<?php echo (!empty($major_err)) ? 'is-invalid' : ''; ?>" name="gender" id="gender" aria-label="select major">
                                <?php
                                if ($gender == "Male") {
                                    echo '<option value=Male selected=\"selected\">Male</option>';
                                    echo '<option value=Female>Female</option>';
                                } else {
                                    echo '<option value=Male >Male</option>';
                                    echo '<option value=Female selected=\"selected\">Female</option>';
                                }
                                ?>
                                }
                            </select>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <input type="submit" class="btn submit-btn" value="Submit">
                        <a href="../index.php" class="btn cancel-btn">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
