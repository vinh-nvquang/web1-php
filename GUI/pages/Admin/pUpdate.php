<?php
    if(isset($_SESSION['uid']) && $_SESSION['tuid'] == 1)
    {
        if(isset($_GET['a']))
        {
            if($_GET['a'] == 22)
            {
//page update cho taikhoan
                if(isset($_GET['mataikhoan']))
                {
                    $adminBUS = new AdminBUS();
                    $adminBUS->FormUpdateTaiKhoan($_GET['mataikhoan']);
                    if(isset($_SESSION['checkdate']))
                    {
                        echo "<script> alert('Date of birth is incorrect!');</script>";
                        unset($_SESSION['checkdate']);
                    }
                    else if(isset($_SESSION['checkfalse']))
                    {
                        echo "<script> alert('Update Account Failed!!');</script>";
                        unset($_SESSION['checkfalse']);
                    }
                }
//page update cho sanpham
                else if(isset($_GET['masanpham']))
                {
                    $adminBUS = new AdminBUS();
                    $adminBUS->FromUpdateSanPham($_GET['masanpham']);
                    if(isset($_SESSION['checknull']))
                    {
                        echo "<script> alert('Please fill in the required information!');</script>";
                        unset($_SESSION['checknull']);
                    }
                    else if(isset($_SESSION['checkfalse']))
                    {
                        echo "<script> alert ('Update Failed!!');</script>";
                        unset($_SESSION['checkfalse']);
                    }
                }
//page update cho loaisanpham
                else if(isset($_GET['maloaisanpham']))
                {
                    $adminBUS = new AdminBUS();
                    $adminBUS->FormUpdateLoaiSanPham($_GET['maloaisanpham']);
                    if(isset($_SESSION['checknull']))
                    {
                        echo "<script> alert('Please fill in the required information!');</script>";
                        unset($_SESSION['checkfalse']);
                    }
                    else if(isset($_SESSION['checkfalse']))
                    {
                        echo "<script> alert('Update Failed!!');</script>";
                        unset($_SESSION['checkfalse']);
                    }
                }
//page update cho hangsanxuat
                else if(isset($_GET['mahangsanxuat']))
                {
                    $adminBUS = new AdminBUS();
                    $adminBUS->FormUpdateHangSanXuat($_GET['mahangsanxuat']);
                    if(isset($_SESSION['checknull']))
                    {
                        echo "<script> alert('Please fill in the required information!');</script>";
                        unset($_SESSION['checkfalse']);
                    }
                    else if(isset($_SESSION['checkfalse']))
                    {
                        echo "<script> alert('Update Failed!!');</script>";
                        unset($_SESSION['checkfalse']);
                    }
                }
//page update cho dondathang
                else if(isset($_GET['madondathang']))
                {
                    $adminBUS = new AdminBUS();
                    $adminBUS->FormUpdateDonDatHang($_GET['madondathang']);
                    if(isset($_SESSION['checkfalse']))
                    {
                        echo "<script> alert('Update Failed!!');</script>";
                        unset($_SESSION['checkfalse']);
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
<?php
    }
    else
    {
        header("location:index.php?a=404");
    }
?>