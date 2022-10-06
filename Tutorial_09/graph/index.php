<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graph</title>
    <link rel="stylesheet" href="../css/style.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        var students;
        var oReq = new XMLHttpRequest(); // New request object
        oReq.onload = function() {
            students = JSON.parse(this.responseText);
        };
        oReq.open("get", "get-data.php", true);
        oReq.send();
    </script>
</head>

<body>
    <div class="center">
        <button class="back-btn"><a href="../index.php" class="btn-success "><i class="fa fa-plus"></i>
                << Back</a></button>
    </div>
    <div class="container">
        <div class="chart">
            <div id="piechart" style="width: 900px; height: 500px;"></div>
        </div>
    </div>
    <div class="container">
        <div class="chart">
            <div id="barchart" style="width: 900px; height: 500px;"></div>
        </div>
    </div>
    <script src="./draw-major.js"></script>
    <script src="./draw-gender.js"></script>
</body>

</html>
