<?php
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-4 offset-4">
                <div class="card my-3">
                    <div class="card-body">
                        <form method="POST" action="insert.php">
                            <div class="mb-3">
                                <label class="form-label">UserName</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter user name..." value="<?php
                                                                                                                            if (isset($_GET['name'])) {
                                                                                                                                if (!$_GET['name'] == "") {
                                                                                                                                    echo $_GET['name'];
                                                                                                                                }
                                                                                                                            }
                                                                                                                            ?>">
                                <span><b><?php if (isset($_GET['name'])) {
                                                if ($_GET['name'] == "") {
                                                    echo "Please fill user email";
                                                }
                                            }
                                            ?></b></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">UserEmail</label>
                                <input type="text" name="email" class="form-control" placeholder="Enter user email..." value="<?php if (isset($_GET['email'])) {
                                                                                                                                    if (!$_GET['email'] == "") {
                                                                                                                                        echo $_GET['email'];
                                                                                                                                    }
                                                                                                                                } ?>">
                                <span><b><?php if (isset($_GET['email'])) {
                                                if ($_GET['email'] == "") {
                                                    echo "Please fill user email";
                                                }
                                            } ?></b></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">UserAddress</label>
                                <input type="text" class="form-control" rows="3" placeholder="Enter user address..." name="address" value="<?php if (isset($_GET['address'])) {
                                                                                                                                                if (!$_GET['address'] == "") {
                                                                                                                                                    echo $_GET['address'];
                                                                                                                                                }
                                                                                                                                            } ?>">
                                <span><b><?php if (isset($_GET['address'])) {
                                                if ($_GET['address'] == "") {
                                                    echo "Please fill user address";
                                                }
                                            } ?></b></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ph.no</label>
                                <input type="text" name="number" class="form-control" placeholder="Enter user phone number..." value="<?php if (isset($_GET['number'])) {
                                                                                                                                            if (!$_GET['number'] == "") {
                                                                                                                                                echo $_GET['number'];
                                                                                                                                            }
                                                                                                                                        } ?>">
                                <span><b><?php if (isset($_GET['number'])) {
                                                if ($_GET['number'] == "") {
                                                    echo "Please fill phone number";
                                                }
                                            } ?></b></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">SavingAmount</label>
                                <input type="text" name="amount" class="form-control" placeholder="Enter user saving amount..." value="<?php if (isset($_GET['amount'])) {
                                                                                                                                            if (!$_GET['amount'] == "") {
                                                                                                                                                echo $_GET['amount'];
                                                                                                                                            }
                                                                                                                                        } ?>">
                                <span><b><?php if (isset($_GET['amount'])) {
                                                if ($_GET['amount'] == "") {
                                                    echo "Please fill saving amount";
                                                }
                                            } ?></b></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">SavingMonth</label>
                                <input type="text" name="month" class="form-control" placeholder="Enter user saving month..." value="<?php if (isset($_GET['month'])) {
                                                                                                                                            if (!$_GET['month'] == "") {
                                                                                                                                                echo $_GET['month'];
                                                                                                                                            }
                                                                                                                                        } ?>">
                                <span><b><?php if (isset($_GET['month'])) {
                                                if ($_GET['month'] == "") {
                                                    echo "Please fill saving month";
                                                }
                                            } ?></b></span>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
