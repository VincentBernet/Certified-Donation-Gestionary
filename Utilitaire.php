<?php
    function flashMessage ()
    {
        if (isset($_SESSION["message"]))
        {
            echo('<span style = "color:red;weight:bold;text-align:center;" >'. $_SESSION["message"] .'</span>');
            unset($_SESSION["message"]);
        }
    }
?>