<?php
    if(isset($_SESSION["uid"]) && $_SESSION['tuid'] == 2)
    {
        if(isset($_POST['update']))
        {
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            if($address == "" || $phone == "")
            {
                $_SESSION['checknull'] = 1;
                header("location:index.php?a=119");
            }
            else
            {
                $taiKhoanBUS = new TaiKhoanBUS();
                $check = $taiKhoanBUS->UpdateInforOrder($address, $phone, $_SESSION['uid']);
                if($check == true)
                {
                    header("location:index.php?a=19");
                }
                else
                {
                    header("location:index.php?a=404");
                }
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