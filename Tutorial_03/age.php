<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate Age</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    function getAge($dob)
    {
        $bday = new DateTime($dob);
        $today = new Datetime(date('m/d/y'));
        if ($bday > $today) {
            return 'You are not born yet';
        }
        $diff = $today->diff($bday);
        return 'This is Your Age: ' . $diff->y . ' Years, ' . $diff->m . ' month, ' . $diff->d . ' days';
    }
    ?>

    <h1 class="center">Calculate Age with Date Picker</h1>
    <div class="form-blk">
        <form>
            <div class="input-blk">
                <label>Your Birthday Plz : <i class="fa-solid fa-cake-candles"></i></label>
                <input type="date" class="bd" name="dob" value="<?php echo (isset($_GET['dob'])) ? $_GET['dob'] : ''; ?>"><br>
                <input type="submit" value="Calculate Age">
            </div>
        </form>
    </div>
    <?php
    if (isset($_GET['dob']) && $_GET['dob'] != '') { ?>
        <div class="result-blk">

            <?php echo getAge($_GET['dob']); ?>
        </div>
    <?php }
    ?>

</body>

</html>
