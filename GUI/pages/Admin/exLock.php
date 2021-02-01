<?php
    if(isset($_SESSION['uid']) && $_SESSION['tuid'] == 1)
    {
        if(isset($_GET['a']))
        {
            if($_GET['a'] == 24)
            {
//thuc thi lock hoac unlock cho taikhoan
                if(isset($_GET['mataikhoan']))
                {
                    if(is_numeric($_GET['mataikhoan']))
                    {
                        $matk = $_GET['mataikhoan'];
                        $taiKhoanBUS = new TaiKhoanBUS();
                        $taiKhoan = $taiKhoanBUS->GetByID($_GET['mataikhoan']);
                        if($taiKhoan != null)
                        {
                            if($taiKhoan->BiXoa == 0)
                            {
                                $taiKhoanBUS->SetDelete($_GET['mataikhoan']);
                                header("location:index.php?a=5");
                            }
                            else
                            {
                                $taiKhoanBUS->UnsetDelete($_GET['mataikhoan']);
                                header("location:index.php?a=5");
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
//thuc thi lock hoac unlock cho sanpham
                else if(isset($_GET['masanpham']))
                {
                    if(is_numeric($_GET['masanpham']))
                    {
                        $sanPhamBUS = new SanPhamBUS();
                        $sanPham = $sanPhamBUS->GetByID($_GET['masanpham']);
                        if($sanPham != null)
                        {
                            if($sanPham->BiXoa == 0)
                            {
                                $sanPhamBUS->SetDelete($_GET['masanpham']);
                                header("location:index.php?a=6");
                            }
                            else
                            {
                                $sanPhamBUS->UnsetDelete($_GET['masanpham']);
                                header("location:index.php?a=6");
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
//thuc thi lock hoac unlock cho loaisanpham
                else if(isset($_GET['maloaisanpham']))
                {
                    if(is_numeric($_GET['maloaisanpham']))
                    {
                        $loaiSanPhamBUS = new LoaiSanPhamBUS();
                        $loaiSanPham = $loaiSanPhamBUS->GetByID($_GET['maloaisanpham']);
                        if($loaiSanPham != null)
                        {
                            if($loaiSanPham->BiXoa == 0)
                            {
                                $loaiSanPhamBUS->SetDelete($_GET['maloaisanpham']);
                                header("location:index.php?a=7");
                            }
                            else
                            {
                                $loaiSanPhamBUS->UnsetDelete($_GET['maloaisanpham']);
                                header("location:index.php?a=7");
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
//thuc thi lock hoac unlock cho hangsanxuat
                else if(isset($_GET['mahangsanxuat']))
                {
                    if(is_numeric($_GET['mahangsanxuat']))
                    {
                        $hangSanXuatBUS = new HangSanXuatBUS();
                        $hangSanXuat = $hangSanXuatBUS->GetByID($_GET['mahangsanxuat']);
                        if($hangSanXuat != null)
                        {
                            if($hangSanXuat->BiXoa == 0)
                            {
                                $hangSanXuatBUS->SetDelete($_GET['mahangsanxuat']);
                                header("location:index.php?a=8");
                            }
                            else
                            {
                                $hangSanXuatBUS->UnsetDelete($_GET['mahangsanxuat']);
                                header("location:index.php?a=8");
                            }
                        }
                        else
                        {
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