<?php
    if(isset($_SESSION['uid']) && $_SESSION['tuid'] == 1)
    {
        if(isset($_GET['a']))
        {
//page chi tiet cho taikhoan
            if(isset($_GET['mataikhoan']) and is_numeric($_GET['mataikhoan']))
            {
                $taiKhoanBUS = new TaiKhoanBUS();
                $admin = new AdminBUS();
                if($taiKhoanBUS->GetByID($_GET['mataikhoan']) == null)
                {
                    echo "<h1 id='error'>Account not found!!!</h1>";
                }
                else
                {
                    $admin->FormDetailAccount($_GET['mataikhoan']);
                    echo '<div id="comback">';
                    echo '</div>';
                    if(isset($_SESSION['checktrue']))
                    {
                        echo "<script> alert('Update Account Successfull!');</script>";
                        unset($_SESSION['checktrue']);
                    }
                }
?>
<?php
            }
//page chi tiet cho san pham
            else if(isset($_GET['masanpham']) and is_numeric($_GET['masanpham']))
            {
                $sanPhamBUS = new SanPhamBUS();
                $admin = new AdminBUS();
                if($sanPhamBUS ->GetByID($_GET['masanpham']) == null)
                {
                    echo "<h1 id='error'>Product not found!!!</h1>";
                }
                else
                {
                    $admin->formDetailProduct($_GET['masanpham']);
                    if(isset($_SESSION['checktrue']))
                    {
                        echo "<script> alert('Update Product Sucessfull!');</script>";
                        unset($_SESSION['checktrue']);
                    }
                }
            }
//page chi tiet cho dondathang
            else if(isset($_GET['madondathang']) and is_numeric($_GET['madondathang']))
            {
                $donDatHangBUS = new DonDatHangBUS();
                $admin = new AdminBUS();
                if($donDatHangBUS->GetByID($_GET['madondathang']) == null)
                {
                    echo "<h1 id='error'>Order not found!!!</h1>";
                }
                else
                {
                    $admin->FormDetailOrder($_GET['madondathang']);
                    echo '<div id="comback">';
                    echo '</div>';
                }
?>
<?php
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