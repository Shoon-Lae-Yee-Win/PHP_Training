<?php
include('db.php');
if (isset($_POST['id']) && !empty($_POST['id'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $delete = mysqli_query($conn, "DELETE FROM users WHERE id='$id'");
        header("location:index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Delete Page</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3 text-uppercase text-primary">Delete Student</h2>
                    <form action="" method="POST">
                        <div class="alert alert-danger">
                            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                            <p>Are you sure you want to delete this student record?</p>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="index.php" class="btn btn-secondary">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
