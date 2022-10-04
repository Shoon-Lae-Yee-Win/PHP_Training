<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_06</title>
    <link rel="stylesheet" href="css/reset.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-5 shadow rounded-4 bg-primary bg-opacity-50">
                <h1 class="text-center my-3">Image Upload Form</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="text-success">Choose file:</label>
                        <input type="file" class="form-control" name="imageUpload">
                        <span><b>
                                <?php if (isset($_POST['submit'])) {
                                    if (($_FILES['imageUpload']['type']) == NULL) {
                                        echo "Please choose file!";
                                    } else {
                                        $foldername = $_POST['folderName'];
                                        $path = __DIR__ . '/' . $foldername;
                                        if (!is_dir($path)) {
                                            mkdir($path, true);
                                        }
                                        $imageName = $_FILES['imageUpload']['name'];
                                        $imageArr = explode('.', $imageName);
                                        $rand = rand(10000, 99999);
                                        $newImageName = $imageArr[0] . $rand . '.' . $imageArr[1];
                                        $image_tmp = $_FILES['imageUpload']['tmp_name'];

                                        // Check if image file is a actual image or fake image
                                        $check = getimagesize($image_tmp);
                                        if ($check !== false) {
                                            $result_file = "File is an image - " . $check["mime"] . ".";
                                        } else {
                                            $err_file = "File is not an image!";
                                        }

                                        // Check file size
                                        $size = $_FILES['imageUpload']['size'];
                                        if ($size > 220000) {
                                            $err_size = "Sorry, your file is too large!";
                                        } else {
                                            $result_size = "Correct file size!";
                                        }

                                        // Allow certain file formats
                                        $target_file =  "$path/" . $newImageName;
                                        $actualExt = strtolower(end($imageArr));
                                        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
                                        if (in_array($actualExt, $allowed)) {
                                            move_uploaded_file($image_tmp, $target_file);
                                            $success = "The file " . htmlspecialchars($newImageName) . " has been uploaded.";
                                        } else {
                                            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed!";
                                        }
                                    }
                                }
                                ?>
                            </b></span>
                    </div>
                    <div class="mb-3">
                        <label class="text-success">Folder name:</label>
                        <input type="text" class="form-control" placeholder="Enter folder name..." name="folderName">
                        <span><b>
                                <?php
                                if (isset($_POST['submit'])) {
                                    if (($_POST['folderName']) == NULL) {
                                        echo "Please fill folder name!";
                                    }
                                }
                                ?>
                            </b></span>
                    </div>
                    <div class="mt-3 mb-5">
                        <button class="btn btn-success px-3" type="submit" name="submit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-md-5 offset-3 mt-5 result-blk">
                <div class="card mt-3">
                    <h4 class="text-center">
                        <?php if ($check !== false) {
                            echo $result_file;
                        } ?>
                    </h4>
                    <h3 class="text-center">
                        <?php
                        if ($check == false) {
                            echo $err_file;
                        }
                        ?>
                    </h3>
                </div>
                <div class="card mt-3">
                    <h3 class="text-center">
                        <?php if ($size > 220000) {
                            echo $err_size;
                        } ?>
                    </h3>
                    <h4 class="text-center">
                        <?php
                        if ($size < 220000) {
                            echo $result_size;
                        }
                        ?>
                    </h4>
                </div>
                <div class="card mt-3">
                    <h4 class="text-center">
                        <?php
                        echo $success;
                        ?>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
