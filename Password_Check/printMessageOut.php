<?php

    $resultImg="";
    $resultSize="";
    function generate_img_str($img,$str)
    {
        if ($img==true)
        {
            //true -> print check mark
        echo '<img src="https://www.nicepng.com/png/full/820-8204132_download-now-check-button-png.png"  width="40" height="50">';
        }
        else
        {   //false -> print cross mark
        
            echo '<img src="http://clipart-library.com/new_gallery/23-233787_red-x-mark-transparent-background.png"  width="60" height="50">';
        }
        echo $str;
        return true;

    }
?>
