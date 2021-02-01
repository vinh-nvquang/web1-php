<?php
if(isset($_GET['a']))
{
    if(isset($_GET['search']))
    {
        if(isset($_POST['ssubmit']))
        {
            $type = 0;
            $man = 0;
            $price = 0;
            if(isset($_POST['typeproduct']))
            {
                if(is_numeric($_POST['typeproduct']) && is_numeric($_POST['manufacturer']))
                {
                    $search = $_GET['search'];
                    $type = $_POST['typeproduct'];
                    $man = $_POST['manufacturer'];
                    $price = $_POST['price'];
                    header("location:index.php?a=30&search=$search&type=$type&manufacturer=$man&price=$price");
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
}
else
{
    header("location:index.php?a=404");
}
?>