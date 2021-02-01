<?php
    if(isset($_SESSION["uid"]) == false)
    {
        include("GUI/modules/mLogin/frmLogin.php");
    }
    else
    {
        include("GUI/modules/mLogin/frmAccountInfo.php");
    }
?>