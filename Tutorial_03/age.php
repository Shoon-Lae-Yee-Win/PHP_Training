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
    //getAge Function
    function getAge($dob)
    {
        $bday = new DateTime($dob);
        $today = new Datetime(date('m/d/y'));
        $diff = $today->diff($bday);
        return 'This is Your Age: ' . $diff->y . ' Years, ' . $diff->m . ' month, ' . $diff->d . ' days';
    }

    //errorAge Function
    function errorAge($dob)
    {
        $bday = new DateTime($dob);
        $today = new Datetime(date('m/d/y'));
        if ($bday > $today) {
            return 'DATE.GREATER';
        } else if ($bday == $today) {
            return 'DATE.SAME';
        } else {
            return 'DATE.VALID';
        }
    }
    ?>
    <h1 class="center">Calculate Age with Date Picker</h1>
    <?php
    // Variable Declaration
    $err_message = '';
    $is_valid = false;
    if (isset($_GET['dob']) && !empty($_GET['dob'])) {
        // get message code
        $messge_code = errorAge($_GET['dob']);
        //check messge code &&  get  message
        switch ($messge_code) {
            case 'DATE.GREATER':
                $err_message = 'You are not born yet!';
                break;
            case 'DATE.SAME':
                $err_message = 'Incorrect date!';
                break;
            case 'DATE.VALID':
                $err_message = '';
                $is_valid = true;
                break;
            default:
                $err_message = 'NULL';
        }
    }
    if (isset($_GET['dob']) && empty($_GET['dob'])) {
        $err_message = "Please fill date!";
    }
    ?>
    <div class="form-blk">
        <form>
            <div class="input-blk">
                <label>Your Birthday Plz : <i class="fa-solid fa-cake-candles"></i></label>
                <input type="date" class="bd" name="dob" value="<?php echo (isset($_GET['dob'])) ? $_GET['dob'] : ''; ?>">
                <br>
                <span>
                    <b>
                        <?php if (!$is_valid && !empty($err_message)) {
                            echo $err_message;
                        }
                        ?>
                    </b>
                </span>
                <input type="submit" value="Calculate Age">
            </div>
        </form>
    </div>
    <?php if ($is_valid) { ?>
        <div class="result-blk">
            <?php echo getAge($_GET['dob']); ?>
        </div>
    <?php } ?>
</body>

</html>
