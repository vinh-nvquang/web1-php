<?php
    class GioHangBUS
    {
        public function Insert($masp)
        {
            $sanPhamBUS = new SanPhamBUS();
            $sanPhamBUS->UpdateSoLuongTon($sanPhamBUS->GetSoLuongTon($masp) -1, $masp);
            if(isset($_SESSION['GioHang']))
            {
                $giohang = new GioHangBUS();
                if(count( $_SESSION['GioHang']) > 10)
                {
                    $_SESSION['checkcartfull'] = 1;
                    header("location:index.php?a=4&masp=$masp");
                }
                else if($giohang->CheckExists($masp) == 1)
                {
                    $_SESSION['GioHang'][$masp]['SoLuong'] += 1;
                    $_SESSION['checkinsertcart'] = 1;
                    header("location:index.php?a=4&masp=$masp");
                }
                else
                {
                    $_SESSION['GioHang'][$masp]['MaSanPham'] = $masp;
                    $_SESSION['GioHang'][$masp]["SoLuong"] = 1;
                    $_SESSION['checkinsertcart'] = 1;
                    header("location:index.php?a=4&masp=$masp");
                }
            }
            else
            {
                $_SESSION['GioHang'] = array();
                $_SESSION['GioHang'][$masp]['MaSanPham'] = $masp;
                $_SESSION['GioHang'][$masp]['SoLuong'] = 1;
                $_SESSION['checkinsertcart'] = 1;
                header("location:index.php?a=4&masp=$masp");
            }
        }
        public function Minus($masp)
        {
            
            $sanPhamBUS = new SanPhamBUS();
            $sanPhamBUS->UpdateSoLuongTon($sanPhamBUS->GetSoLuongTon($masp) + 1, $masp);
            foreach($_SESSION['GioHang'] as $key => $value)
            { 
                if($_SESSION['GioHang'][$key]['MaSanPham'] == $masp)
                {
                    if($_SESSION['GioHang'][$key]['SoLuong'] <= 1)
                    {
                        unset($_SESSION['GioHang'][$key]);
                    }
                    else
                    {
                        $_SESSION['GioHang'][$key]['SoLuong'] -= 1;
                    }
                }
            }
        }
        public function Plus($masp)
        {
            $sanPhamBUS = new SanPhamBUS();
            if($sanPhamBUS->GetSoLuongTon($masp) < 1)
            {
                $_SESSION['checkoutstock'] = 1;
                header("location:index.php?a=4&masp=$masp");
            }
            else
            {
                $sanPhamBUS->UpdateSoLuongTon($sanPhamBUS->GetSoLuongTon($masp) - 1, $masp);
                foreach($_SESSION['GioHang'] as $key=>$value)
                { 
                    if($_SESSION['GioHang'][$key]['MaSanPham'] == $masp)
                    {
                        $_SESSION['GioHang'][$key]['SoLuong'] += 1;
                    }
                }
            }
        }
        public function Delete($masp)
        {
            foreach($_SESSION['GioHang'] as $key=>$value)
            { 
                if($_SESSION['GioHang'][$key]['MaSanPham'] == $masp)
                {
                    $sanPhamBUS = new SanPhamBUS();
                    $sanPhamBUS->UpdateSoLuongTon($sanPhamBUS->GetSoLuongTon($masp) + $_SESSION['GioHang'][$key]['SoLuong'], $masp);
                    unset($_SESSION['GioHang'][$key]);
                }
            }
        }
        public function CheckExists($masp)
        {
            foreach($_SESSION['GioHang'] as $key=>$value)
            { 
                if($_SESSION['GioHang'][$key]['MaSanPham'] == $masp)
                {
                    return 1;
                }
            }
            return 0;
        }
        public function CreateID()
        {
            $donDatHangBUS = new DonDatHangBUS();
            $madonDatHang = $donDatHangBUS->GetMaxID();
            $date = getdate();
            if($madonDatHang ==  null)
            {
                $did = (string)$date['mday'].(string)$date['mon'].substr((string)$date['year'], 2, 2);
                $did = (int)$did *1000 + 1;
                return (string)$did;
            }
            else
            {
                if(substr($madonDatHang, 0, 2) == (string)$date['mday'] &&
                    substr($madonDatHang, 2, 2) == (string)$date['mon'] &&
                    substr($madonDatHang, 4, 2) == substr((string)$date['year'], 2, 2))
                {
                    return (string)((int)$madonDatHang + 1);
                }
                else
                {
                    $did = (string)$date['mday'].(string)$date['mon'].substr((string)$date['year'], 2, 2);
                    $did = (int)$did *1000 + 1;
                    return (string)$did;
                }
            }
        }
    }
?>