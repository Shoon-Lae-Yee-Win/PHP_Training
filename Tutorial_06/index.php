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
                <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="text-success">Choose file:</label>
                        <input type="file" class="form-control" name="imageUpload">
                        <?php if (isset($_GET['error'])) : ?>
                            <small class="text-danger mb-3">
                                Please choose image file!
                            </small>
                        <?php endif ?>
                    </div>
                    <div class="mb-3">
                        <label class="text-success">Folder name:</label>
                        <input type="text" class="form-control" placeholder="Enter folder name..." name="folderName">
                        <?php if (isset($_GET['error'])) : ?>
                            <small class="text-danger">
                                Please fill your folder name!
                            </small>
                        <?php endif ?>
                    </div>
                    <div class="mt-3 mb-5">
                        <button class="btn btn-success px-3" type="submit" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
