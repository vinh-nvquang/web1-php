<?php
    if(isset($_SESSION['uid']) && $_SESSION['tuid'] == 1)
    {
        if(isset($_GET['a']))
        {
            if($_GET['a'] == 23)
            {
//thuc thi delete cho taikhoan
                if(isset($_GET['mataikhoan']) and is_numeric($_GET['mataikhoan']))
                {
                    $taiKhoanBUS = new TaiKhoanBUS();
                    if($taiKhoanBUS->GetByID($_GET['mataikhoan']) != null)
                    {
                        $check = $taiKhoanBUS->Delete($_GET['mataikhoan']);
                        if($check == true)
                        {
                            header("location:index.php?a=5");
                        }
                        else
                        {
                            $_SESSION['deleteexists'] = 1;
                            header("location:index.php?a=5");
                        }   
                    }
                    else
                    {
                        header("location:index.php?a=404");
                    }
                }
//thuc thi delete sanpham
                if(isset ($_GET['masanpham']) and is_numeric($_GET['masanpham']))
                {
                    $sanPhamBUS = new SanPhamBUS();
                    if($sanPhamBUS->GetByID($_GET['masanpham']) != null)
                    {
                        $check = $sanPhamBUS ->Delete($_GET['masanpham']);
                        if($check == true)
                        {
                            header("location:index.php?a=6");
                        }
                        else
                        {
                            $_SESSION['deleteexists'] = 1;
                            header("location:index.php?a=6");
                        }
                    }
                    else 
                    {
                        header("location:index.php?a=404");
                    }
                }
//thuc thi delete cho loaisanpham
                else if(isset($_GET['maloaisanpham']) and is_numeric($_GET['maloaisanpham']))
                {
                    $loaiSanPhamBUS = new LoaiSanPhamBUS();
                    $loaiSanPham = $loaiSanPhamBUS->GetByID($_GET['maloaisanpham']);
                    if($loaiSanPham != null)
                    {
                        $check = $loaiSanPhamBUS->Delete($_GET['maloaisanpham']);
                        if($check == true)
                        {
                            header("location:index.php?a=7");
                        }
                        else
                        {
                            $_SESSION['deleteexists'] = 1;
                            header("location:index.php?a=7");
                        }
                    }
                    else
                    {
                        header("location:index.php?a=404");
                    }
                }
//thuc thi delete cho hangsanxuat
                else if(isset($_GET['mahangsanxuat']) and is_numeric($_GET['mahangsanxuat']))
                {
                 
                    $hangSanXuatBUS = new HangSanXuatBUS();
                    $hangSanXuat = $hangSanXuatBUS->GetByID($_GET['mahangsanxuat']);
                    if($hangSanXuat != null)
                    {
                        $check = $hangSanXuatBUS->Delete($_GET['mahangsanxuat']);
                        if($check == true)
                        {
                            header("location:index.php?a=8");
                        }
                        else
                        {
                            $_SESSION['deleteexists'] = 1;
                            header("location:index.php?a=8");
                        }   
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
    }
    else
    {
        header("location:index.php?a=404");
    }
?>