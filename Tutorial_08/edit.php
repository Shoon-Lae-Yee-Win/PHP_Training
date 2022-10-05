<?php
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id='$id'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);
    ?>
        <div class="container">
            <div class="row mt-2">
                <div class="col-md-4 offset-4">
                    <div class="card my-3">
                        <div class="card-body">
                            <form method="POST" action="update.php">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <div class="mb-3">
                                    <label class="form-label">UserName</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter user name..." value="<?php echo $row['name']; ?>">
                                    <span class="invalid-feedback"><?php echo $name_err; ?></span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">UserEmail</label>
                                    <input type="text" name="email" class="form-control placeholder=" Enter user email..." value="<?php echo $row['email']; ?>">
                                    <span class="invalid-feedback"><?php echo $email_err; ?></span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">UserAddress</label>
                                    <input type="text" class="form-control" rows="3" placeholder="Enter user address..." name="address" value="<?php echo $row['address']; ?>">
                                    <span class="invalid-feedback"><?php echo $address_err; ?></span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Ph.no</label>
                                    <input type="text" name="number" class="form-control <?php echo (!empty($number_err)) ? 'is-invalid' : ''; ?>" placeholder="Enter user phone number..." value="<?php echo $row['number']; ?>">
                                    <span class="invalid-feedback"><?php echo $number_err; ?></span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">SavingAmount</label>
                                    <input type="text" name="amount" class="form-control <?php echo (!empty($amount_err)) ? 'is-invalid' : ''; ?>" placeholder="Enter user saving amount..." value="<?php echo $row['amount']; ?>">
                                    <span class="invalid-feedback"><?php echo $amount_err; ?></span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">SavingMonth</label>
                                    <input type="text" name="month" class="form-control <?php echo (!empty($month_err)) ? 'is-invalid' : ''; ?>" placeholder="Enter user saving month..." value="<?php echo $row['month']; ?>">
                                    <span class="invalid-feedback"><?php echo $month_err; ?></span>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <button type="submit" class="btn" name="save">Save</button>
                                <button class="btn cancel-btn"><a href="index.php">Cancel</a></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
