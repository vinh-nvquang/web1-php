<?php
    if(isset($_SESSION['uid']) && $_SESSION['tuid'] == 1)
    {
        if(isset($_GET['a']))
        {
//update cho taikhoan
            if(isset($_GET['mataikhoan']) and is_numeric($_GET['mataikhoan']))
            {
                $taiKhoanBUS = new TaiKhoanBUS();
                if(isset($_POST['update']))
                {
                    $us = $_POST['usname'];
                    $fullname = $_POST['fullname'];
                    $adress = $_POST['adress'];
                    $matk = $_GET['mataikhoan'];
                    $day = $_POST["day"];
                    $month = $_POST["month"];
                    $year = $_POST["year"];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    if($month != 0 || $day!= 0 || $year != 0)
                    {
                        if(checkdate($month, $day, $year) == false)
                        {
                            $_SESSION['checkdate'] = 1;
                            header("location:index.php?a=22&mataikhoan=$matk");
                        }
                        else
                        {
                            $taiKhoan = $taiKhoanBUS->GetByID($_GET['mataikhoan']);
                            $taiKhoan->TenHienThi = $fullname;
                            $taiKhoan->DiaChi = $adress;
                            $taiKhoan->NgaySinh = $year."-".$month."-".$day;
                            $taiKhoan->DienThoai = $phone;
                            $taiKhoan->Email = $email;
                            $check = $taiKhoanBUS->Update($taiKhoan);
                            if($check == true)
                            {
                                header("location:index.php?a=27&mataikhoan=$matk");
                            }
                            else
                            {
                                $_SESSION['checkfalse'] = 1;
                                header("location:index.php?a=22&mataikhoan=$matk");
                            }
                        }
                    }
                    else
                    {
                        $taiKhoan = new TaiKhoanDTO();
                        $taiKhoan->MaTaiKhoan = $_GET['mataikhoan'];
                        $taiKhoan->TenHienThi = $fullname;
                        $taiKhoan->DiaChi = $adress;
                        $taiKhoan->DienThoai = $phone;
                        $taiKhoan->Email = $email;
                        $check = $taiKhoanBUS->Update($taiKhoan);
                        if($check == true)
                        {
                            $_SESSION['checktrue'] = 1;
                            header("location:index.php?a=27&mataikhoan=$matk");
                        }
                        else
                        {
                            $_SESSION['checkfalse'] = 1;
                            header("location:index.php?a=22&mataikhoan=$matk");
                        }
                    }
                }
            }
//update cho sanpham
            else if(isset($_GET['masanpham']) and is_numeric($_GET['masanpham']))
            {
                $masp = $_GET['masanpham'];
                $sanPhamBUS = new SanPhamBUS();
                if(isset($_POST['update']))
                {
                    $name = $_POST['adname'];
                    $price = $_POST['price'];
                    $quaex = $_POST['quaex'];
                    $datad = $_POST['datad'];
                    if($name == "" || $price=="" || $quaex == "" ||  $datad == "")
                    {
                        $_SESSION['checknull'] = 1;
                        header("location:index.php?a=22&masanpham=$masp");
                    }
                    else
                    {
                        $sanPham = $sanPhamBUS->GetByID($_GET['masanpham']);
                        $sanPham->TenSanPham = $name;
                        $sanPham->GiaSanPham = $price;
                        $sanPham->SoLuongTon = $quaex;
                        $sanPham->NgayNhap = $datad;
                        $check = $sanPhamBUS->Update($sanPham);
                        if($check == true)
                        {
                            $_SESSION['checktrue'] = 1;
                            header("location:index.php?a=27&masanpham=$masp");
                        }
                        else {
                            $_SESSION['checkfalse'] = 1;
                            header("location:index.php?a=22&masanpham=$masp");
                        }
                    }
                }
            }
//update cho loaisanpham
            else if(isset($_GET['maloaisanpham']) and is_numeric($_GET['maloaisanpham']))
            {
                $loaiSanPhamBUS = new LoaiSanPhamBUS();
                if(isset($_POST['update']))
                {
                    $name = $_POST['adname'];
                    if($name == "")
                    {
                        $malsp = $_GET['maloaisanpham'];
                        $_SESSION['checknull'] = 1;
                        header("location:index.php?a=22&maloaisanpham=$malsp");
                    }
                    $loaiSanPham = $loaiSanPhamBUS->GetByID($_GET['maloaisanpham']);
                    $loaiSanPham->TenLoaiSanPham = $name;
                    $check = $loaiSanPhamBUS->Update($loaiSanPham);
                    if($check)
                    {
                        header("location:index.php?a=7");
                    }
                    else
                    {
                        $_SESSION['checkfalse'] = 1;
                        header("location:index.php?a=7");
                    }
                }
            }
//update cho hangsanxuat
            else if(isset($_GET['mahangsanxuat']) and is_numeric($_GET['mahangsanxuat']))
            {
                $hangSanXuatBUS = new HangSanXuatBUS();
                if(isset($_POST['update']))
                {
                    $name = $_POST['adname'];
                    if($name == "")
                    {
                        $madh = $_GET['mahangsanxuat'];
                        $_SESSION['checknull'] = 1;
                        header("location:index.php?a=22&mahangsanxuat=$madh");
                    }
                    $hangSanXuat = $hangSanXuatBUS->GetByID($_GET['mahangsanxuat']);
                    $hangSanXuat->TenHangSanXuat = $name;
                    $check = $hangSanXuatBUS->Update($hangSanXuat);
                    if($check)
                    {
                        header("location:index.php?a=8");
                    }
                    else
                    {
                        $_SESSION['checkfalse'] = 1;
                        header("location:index.php?a=8");
                    }
                }
            }
//update cho dondathang
            else if(isset($_GET['madondathang']) and is_numeric($_GET['madondathang']))
            {
                $donDatHangBUS = new DonDatHangBUS();
                if(isset($_POST['update']))
                {
                    $status = $_POST['status'];
                    $donDatHang = $donDatHangBUS->GetByID($_GET['madondathang']);
                    $donDatHang->MaTinhTrang = $status;
                    $check = $donDatHangBUS->Update($donDatHang);
                    if($check == true)
                    {
                        header("location:index.php?a=9");
                    }
                    else
                    {
                        $_SESSION['checkfalse'] = 1;
                        header("location:index.php?a=9");
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