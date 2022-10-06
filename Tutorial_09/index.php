<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tutorial_09</title>
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="title-blk">
        <h2>Students Table</h2>
        <button class="btn"><a href="crud/create_student.php">Add student</a></button>
        <button class="btn mx-3"><a href="graph/index.php">Go to graph</a></button>
    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <?php
                require_once "database/config.php";
                $sql = "SELECT * from student";
                if ($result = mysqli_query($link, $sql)) {
                    if (mysqli_num_rows($result) > 0) { ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Age</th>
                                    <th>Major</th>
                                    <th>Gender</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($result)) { ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['student_name']; ?></td>
                                        <td><?php echo $row['address']; ?></td>
                                        <td><?php echo $row['age']; ?></td>
                                        <td><?php echo $row['major']; ?></td>
                                        <td><?php echo $row['gender']; ?></td>
                                        <td><button class="btn edit-btn"><a href="./crud/update_student.php?id=<?php echo $row['id']; ?>">Edit</a></button></td>
                                        <td><button class="btn delete-btn"><a href="./crud/delete_student.php?id=<?php echo $row['id']; ?>">Delete</a></button></td>
                                    </tr>
                        <?php
                                }
                                mysqli_free_result($result);
                            } else {
                                echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                            }
                        } else {
                            echo "Oops! Something went wrong. Please try again later.";
                        }
                        mysqli_close($link);
                        ?>
            </div>
        </div>
    </div>
</body>

</html>
