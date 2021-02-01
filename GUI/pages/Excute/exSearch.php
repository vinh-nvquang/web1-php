<?php
    if(isset($_POST['submit']))
    {
        if(isset($_POST['search']))
        {
            $search = $_POST['search'];
            header("location:index.php?a=29&search=$search");
        }
        else
        {
            header("location:index.php?a=404");
        }
    }
    else
    {
        header("location:index.php?a=404");
    }
?>