<?php
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud With One Table</title>
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="title-blk">
        <h1 class="title">Show Money List</h1>
        <button class="btn"><a href="register.php">Save Money</a></button>
    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>UserName</th>
                            <th>UserEmail</th>
                            <th>UserAddress</th>
                            <th>Ph.no</th>
                            <th>SavingAmount</th>
                            <th>SavingMonth</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM users ";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($query)) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['number']; ?></td>
                                <td><?php echo $row['amount']; ?></td>
                                <td><?php echo $row['month']; ?></td>
                                <td><button class="btn edit-btn"><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></button></td>
                                <td><button class="btn delete-btn"><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></button></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
