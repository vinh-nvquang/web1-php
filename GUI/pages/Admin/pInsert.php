<?php
    if(isset($_SESSION['uid']) && $_SESSION['tuid'])
    {
        if(isset($_GET['a']))
        {
//page insert cho taikhoan
            if($_GET['id'] == 5)
            {
                $adminBUS = new AdminBUS();
                $adminBUS->FormInsertTaiKhoan($_GET['id']);
                if(isset($_SESSION['checknull']))
                {
                    echo "<script> alert('Please fill in the required information!');</script>";
                    unset($_SESSION['checknull']);
                }
                else if(isset($_SESSION['checkexists']))
                {
                    echo "<script> alert('Username already exists!');</script>";
                    unset($_SESSION['checkexists']);
                }
                else if(isset($_SESSION['checkpass']))
                {
                    echo "<script> alert('Confirm password is incorrect!');</script>";
                    unset($_SESSION['checkpass']);
                }
                else if(isset($_SESSION['checkdate']))
                {
                    echo "<script> alert('Date of birth is incorrect!');</script>";
                    unset($_SESSION['checkpass']);
                }
                else if(isset($_SESSION['checktrue']))
                {
                    echo "<script> alert('Insert Account Successfull!');</script>";
                    unset($_SESSION['checktrue']);
                }
                else if(isset($_SESSION['checkfalse']))
                {
                    echo "<script> alert('Insert False!');</script>";
                    unset($_SESSION['checkfalse']);
                }
            }
//page insert cho sanpham
            else if($_GET['id'] == 6)
            {
                $adminBUS = new AdminBUS();
                $adminBUS->FormInsertSanPham($_GET['id']);
                if(isset($_SESSION['productnull']))
                {
                    echo "<script> alert('Please fill in the required information!');</script>";
                    unset($_SESSION['productnull']);
                }
                else if(isset($_SESSION['checkprice']))
                {
                    echo "<script> alert('Invalid price!');</script>";
                    unset($_SESSION['checkprice']);
                }
                else if(isset($_SESSION['checkquaex']))
                {
                    echo "<script> alert('Invalid quality!');</script>";
                    unset($_SESSION['checkquaex']);
                }
                else if(isset($_SESSION['bigfile']))
                {
                    echo "<script> alert('Big image file!');</script>";
                    unset($_SESSION['bigfile']);
                }
                else if(isset($_SESSION['invalidfile']))
                {
                    echo "<script> alert('Invalid image file!');</script>";
                    unset($_SESSION['invalidfile']);
                }
                else if(isset($_SESSION['filenull']))
                {
                    echo "<script> alert('Please select file!');</script>";
                    unset($_SESSION['filenull']);
                }
                else if(isset($_SESSION['checkfalse']))
                {
                    echo "<script> alert('Insert Failed!');</script>";
                    unset($_SESSION['checkfalse']);
                }
                else if(isset($_SESSION['checktrue']))
                {
                    echo "<script> alert('Insert Success!');</script>";
                    unset($_SESSION['checktrue']);
                }
            }
//page insert cho loaitakhoan
            else if($_GET['id'] == 7)
            {
                $adminBUS = new AdminBUS();
                $adminBUS->FormInsertLoaiSanPham($_GET['id']);
                if(isset($_SESSION['checknull']))
                {
                    echo "<script> alert('Please fill in the required information!');</script>";
                    unset($_SESSION['checknull']);
                }
                else if(isset($_SESSION['checkfalse']))
                {
                    echo "<script> alert('Insert Failed!');</script>";
                }
            }
//page insert cho hangsanxuat
            else if($_GET['id'] == 8)
            {
                $adminBUS = new AdminBUS();
                $adminBUS->FormInsertHangSanXuat($_GET['id']);
                if(isset($_SESSION['checknull']))
                {
                    echo "<script> alert('Please fill in the required information!');</script>";
                    unset($_SESSION['checknull']);
                }
                else if(isset($_SESSION['checkfalse']))
                {
                    echo "<script> alert('Insert Failed!');</script>";
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
<?php
    }
    else
    {
        header("location:index.php?a=404");  
    }
?>