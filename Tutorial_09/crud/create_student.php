<?php
require_once "../database/config.php";

// Define variables and initialize with empty values
$name = $address = $age = $major = $gender = "";
$name_err = $address_err = $age_err = $major_err = $gender_err = "";
$select_style = "'custom-select form-select'";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
        $address = nl2br($address);
    }

    // Validate age
    $input_age = trim($_POST["age"]);
    if (empty($input_age)) {
        $age_err = "Please enter the age.";
    } elseif (!ctype_digit($input_age)) {
        $age_err = "Please enter a positive integer value.";
    } else {
        $age = $input_age;
    }

    // Validate major
    $input_major = trim($_POST["major"]);
    if (empty($input_major)) {
        $major_err = "Please enter the major.";
    } else {
        $major = strtoupper($input_major);
    }

    // Validate gender
    $input_gender = trim($_POST["gender"]);
    if (empty($input_gender)) {
        $gender_err = "Please choose gender.";
        $select_style = "'custom-select form-select error'";
    } else {
        $gender = $input_gender;
    }

    // Check input errors before inserting in database
    if (empty($name_err) && empty($address_err) && empty($age_err) && empty($major_err) && empty($gender_err)) {
        $sql = "INSERT INTO student (student_name,address,age,major,gender) VALUES (?,?,?,?,?)";
        if ($stmt = mysqli_prepare($link, $sql)) {
            $param_name = $name;
            $param_address = $address;
            $param_age = $age;
            $param_major = $major;
            $param_gender = $gender;
            mysqli_stmt_bind_param($stmt, "ssiss", $param_name, $param_address, $param_age, $param_major, $gender);
            if (mysqli_stmt_execute($stmt)) {
                header("location: ../index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                <div class="col-md-12 shadow mt-3">
                    <h2 class="text-uppercase text">Create Student</h2>
                    <p class="text-danger text">Please fill this form and submit to add Student record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="my-3 p-3">
                        <div class="form-group mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>" placeholder="Enter student name...">
                            <span class="invalid-feedback"><?php echo $name_err; ?></span>
                        </div>
                        <div class="form-group mb-3">
                            <label>Address</label>
                            <textarea name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>" placeholder="Enter address..."><?php echo $address; ?></textarea>
                            <span class="invalid-feedback"><?php echo $address_err; ?></span>
                        </div>
                        <div class="form-group mb-3">
                            <label>Age</label>
                            <input type="number" name="age" class="form-control <?php echo (!empty($age_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $age; ?>" placeholder="Enter age...">
                            <span class="invalid-feedback"><?php echo $age_err; ?></span>
                        </div>
                        <div class="form-group mb-4">
                            <label>Major</label>
                            <input type="text" name="major" class="form-control <?php echo (!empty($major_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $major; ?>" placeholder="Enter major...">
                            <span class="invalid-feedback"><?php echo $major_err; ?></span>
                        </div>
                        <div class="input-group form-group">
                            <select class=<?php echo $select_style; ?> name="gender">
                                <?php
                                if ($gender == "Male") {
                                    echo "<option value='Male' selected >Male</option>";
                                    echo "<option value='Female'>Female</option>";
                                } else if ($gender == "Female") {
                                    echo "<option value='Male'  >Male</option>";
                                    echo "<option value='Female' selected>Female</option>";
                                } else {
                                    echo "<option selected  value=''>Choose Gender</option>";
                                    echo "<option value='Male'  >Male</option>";
                                    echo "<option value='Female'>Female</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <span class="text-danger error-text"><?php echo $gender_err; ?></span> <br><br>
                        <a href="../index.php" class="btn cancel-btn">Cancel</a>
                        <input type="submit" class="btn submit-btn" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
