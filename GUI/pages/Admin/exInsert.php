<?php
    if(isset($_SESSION['uid']) && $_SESSION['tuid'] == 1)
    {
        if(isset($_GET['a']))
        {
            if(isset($_POST['insert']))
            {
                if(isset($_GET['id']))
                {
//thuc hien insert cho tai khoan
                    if($_GET['id'] == 5)
                    {
                       
                        $fullname = $_POST["fullname"];
                        $day = $_POST["day"];
                        $month = $_POST["month"];
                        $year = $_POST["year"];
                        $city = $_POST["city"];
                        $phone = $_POST['phone'];
                        $email = $_POST['email'];
                        $type = $_POST['type'];
                        $usname = $_POST["usname"];
                        $pass = $_POST["password"];
                        $cfpass=$_POST["cfpassword"];
                        $taiKhoanBUS = new TaiKhoanBUS();
                        $a = $taiKhoanBUS->CheckExistsUser($usname);
                        if($usname == "" || $pass == "" || $cfpass =="")
                        {
                            $_SESSION['checknull'] = 1;
                            header("location:index.php?a=21&id=5");
                        }
                        else if($a == 1)
                        {
                            $_SESSION['checkexists'] = 1;
                            header("location:index.php?a=21&id=5");
                        }
                        else if($cfpass!=$pass)
                        {
                            $_SESSION['checkpass'] = 1;
                            header("location:index.php?a=21&id=5");
                        }
                        else if($day != 0 || $month != 0 || $year != 0)
                        {
                            if(checkdate($month, $day, $year) == false)
                            {
                                $_SESSION['checkdate'] = 1;
                                header("location:index.php?a=21&id=5");
                            }
                        }
                        else
                        {
                            $taiKhoan = new TaiKhoanDTO();
                            $taiKhoan->TenDangNhap = $usname;
                            $taiKhoan->MatKhau = md5($pass);
                            if($day!=0 ||$month != 0 || $year != 0)
                            {
                                $taiKhoan->NgaySinh = $year."-".$month."-".$day;
                            }
                            else
                            {
                                $taiKhoan->NgaySinh = NULL;
                            }
                            $taiKhoan->TenHienThi = $fullname;
                            $taiKhoan->DiaChi = $city;
                            $taiKhoan->DienThoai = $phone;
                            $taiKhoan->Email = $email;
                            $taiKhoan->LoaiTaiKhoan = $type;
                            $check = $taiKhoanBUS->Insert($taiKhoan);
                            if($check == true)
                            {
                                $_SESSION['checktrue'] = 1;
                                header("location:index.php?a=21&id=5");
                            }
                            else
                            {
                                $_SESSION['checkfalse'] = 1;
                                header("location:index.php?a=21&id=5");
                            }
                        }
                    }
//thuc hien insert cho san pham
                    else if($_GET['id'] == 6)
                    {
                       $name = $_POST['adname'];
                        $manu = $_POST['manufacture'];
                        $typep = $_POST['typeofproduct'];
                        $price = $_POST['price'];
                        $quaex = $_POST['quaex'];
                        $date = date('Y-m-d');
                        $filename = $_FILES['image_file']['name'];
                        if($name =="" || $manu == "" || $typep =="" ||$price == "" || $quaex == "")
                        {
                            $_SESSION['productnull'] = 1;
                        }
                        else if(!is_numeric($price))
                        {
                            $_SESSION['checkprice'] = 1;
                        }
                        else if(!is_numeric($quaex))
                        {
                            $_SESSION['checkquaex'] = 1;   
                        }
                        else if($filename != "")
                        {
                            $allowed_ext = array("jpg", "png" );
                            $tmp = explode('.', $filename);
                            $ext = end($tmp);
                            if(in_array($ext, $allowed_ext))
                            {
                                if($_FILES["image_file"]["size"]<50000)
                                {
                                    $fname = md5(rand()).'.'.$ext;
                                    $path = "GUI/images/".$name;
                                    move_uploaded_file($_FILES["image_file"]["tmp_name"], $path);
                                    $sanPham = new SanPhamDTO();
                                    $sanPham->TenSanPham = $name;
                                    $sanPham->HinhURL = $fname;
                                    $sanPham->GiaSanPham = $price;
                                    $sanPham->NgayNhap = $date;
                                    $sanPham->SoLuongTon = $quaex;
                                    $sanPham->MaHangSanXuat = $manu;
                                    $sanPham->MaLoaiSanPham = $typep;
                                    $sanPhamBUS = new SanPhamBUS();
                                    $check = $sanPhamBUS->Insert($sanPham);
                                    if($check)
                                    {
                                        $_SESSION['checktrue'] = 1;
                                        header("location:index.php?a=21&id=6");
                                    }
                                    else
                                    {
                                        $_SESSION['checkfalse'] = 1;
                                        header("location:index.php?a=21&id=6");
                                    }
                                }
                                else
                                {
                                    $_SESSION['bigfile'] = 1;
                                    header("location:index.php?a=21&id=6");
                                }
                            }
                            else
                            {
                                $_SESSION['invalidfile'] = 1;
                                header("location:index.php?a=21&id=6");
                            }
                        }
                        else
                        {
                            $_SESSION['filenull'] = 1;
                            header("location:index.php?a=21&id=6");
                        }
                    }
//thuc hien insert cho loai san pham
                    else if($_GET['id'] == 7)
                    {
                        $loaiSanPhamBUS = new LoaiSanPhamBUS();
                        $name = $_POST['adname'];
                        if($name == "")
                        {
                            $_SESSION['checknull'] = 1;
                            header("location:index.php?a=21&id=7");
                        }
                        else
                        {
                            $loaiSanPham = new LoaiSanPhamDTO();
                            $loaiSanPham->TenLoaiSanPham = $name;
                            $check = $loaiSanPhamBUS->Insert($loaiSanPham);
                            if($check)
                            {
                                header("location:index.php?a=7");
                            }
                            else
                            {
                                $_SESSION['checkfalse'] = 1;
                                header("location:index.php?a=21&id=7");
                            }
                        }
                    }
//thuc hien insert cho hang san xuat
                    else if($_GET['id'] == 8)
                    {
                        $hangSanXuatBUS = new HangSanXuatBUS();
                        $name = $_POST['adname'];
                        if($name =="")
                        {
                            $_SESSION['checknull'] = 1;
                            header("location:index.php?a=21&id=8");
                        }
                        else
                        {
                            $id = $hangSanXuatBUS->GetMaxID();
                            if($id == null)
                            {
                                $id = 1;
                            }
                            else
                            {
                                $id += 1;
                            }
                            $hangSanXuat = new HangSanXuatDTO();
                            $hangSanXuat->MaHangSanXuat = $id;
                            $hangSanXuat->TenHangSanXuat = $name;
                            $check = $hangSanXuatBUS->Insert($hangSanXuat);
                            if($check)
                            {
                                $loaiSanPhamBUS = new LoaiSanPhamBUS();
                                $lst = array();
                                $lst = $loaiSanPhamBUS->GetAll();
                                foreach($lst as $loaiSanPham)
                                {
                                    if(isset($_POST[$loaiSanPham->MaLoaiSanPham]))
                                    {
                                        $hsxcualsp = new HSXCuaLSpBUS();
                                        $hsxcualsp->Insert($loaiSanPham->MaLoaiSanPham, $id);
                                    }
                                }
                                header("location:index.php?a=8");
                            }
                            else
                            {
                                $_SESSION['checkfalse'] = 1;
                                header("location:index.php?a=21&id=8");
                            }
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