<?php
if (isset($_POST["submit"])) {
    $foldername = $_POST['folderName'];
    $structure = dirname(__FILE__) . DIRECTORY_SEPARATOR . $foldername;
    if (!mkdir($structure, 0777, true)) {
        header("location: index.php?error=1");
    }
    $imageName = $_FILES['imageUpload']['name'];
    $imageArr = explode('.', $imageName);
    $rand = rand(10000, 99999);
    $newImageName = $imageArr[0] . $rand . '.' . $imageArr[1];
    $target_dir = "$structure/";
    $target_file = $target_dir . basename($newImageName);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["imageUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".<br>";
            $uploadOk = 1;
        } else {
            echo "File is not an image."."<br>";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["imageUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large."."<br>";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed."."<br>";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($newImageName)) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

