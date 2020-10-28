<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checking Password</title>
</head>
<body>
    <h1> Checking password </h1>
    <form action="main.php" method="post">
        Enter your password: <input type="text" name="input_pass">
        <input type="submit" value="Check me">
    </form>
    <br>
    
    <?php
        $pw = $_POST["input_pass"];

        echo 'The password you entered: ';
        echo $pw;
        echo '<br><br>';

        include 'checkPassFunc.php';
        include 'printMessageOut.php';

        $checkImg = "https://www.nicepng.com/png/full/820-8204132_download-now-check-button-png";
        $checkSize = "width='40' height='50'";
        $crossImg ="http://clipart-library.com/new_gallery/23-233787_red-x-mark-transparent-background";
        $crossSize ="width='60' height='50'";

        
        $check_len = check_length($pw);
        $check_LetterNum = false; //init
        $check_special= false;//init
        $check_bad= false;//init
        $check_repeat=false;

        //string must has at least 8 char above
        if ($check_len == true) 
        {
            //string must has letters and numbers
            $check_LetterNum = has_both_Alpha_Num($pw);
            //string must has at least 1 special character
            $check_special = has_specialChar($pw);
            //string has no repeating 1st,2nd char
            $check_repeat = has_NoRepeat($pw);
            //string must not a "bad" phrase
            $check_bad = is_notBadWord($pw);

        }
        $print = generate_img_str($check_len, "Your password have at least 8 characters or above<br>");
        $print1 = generate_img_str($check_LetterNum, "Your password must contains letters and numbers<br>");
        $print2 = generate_img_str($check_special, "Your password must have at least 1 special characters<br>");
        $print3= generate_img_str($check_repeat, "Your password must have no repetition. Example for unaccepted password: 121212, 00000000, adadadad<br>");
        $print2 = generate_img_str($check_bad, "Your password is not a 'bad' phrase<br>");

        if ($check_len== true && $check_special==true && $check_LetterNum==true && $check_repeat==true && $check_bad==true)
        {
            echo '<br><h3>Congrats! You have a perfect password!!</h3>';
            echo '<br><img src="https://www.memesmonkey.com/images/memesmonkey/b3/b3a6ee747a74c3dd08d4d0ef12bfccff.jpeg">';
            
        }
        else
        {
            echo '<br><h3>Sorry, your password is not qualified. Please enter a different one!</h3>';
            echo '<br><img src="https://media.tenor.com/images/75c28ecae6b5ab47e703d340d01d3da6/tenor.gif">';
        }

    ?>

</body>
</html>