<?php
    if(isset($_SESSION['GioHang']))
    {
        if(count($_SESSION['GioHang']) > 0)
        {
            $sanPhamBUS = new SanPhamBUS();
            foreach ($_SESSION['GioHang'] as $key => $value) {
                $masp = $_SESSION['GioHang'][$key]['MaSanPham'];
                $soLuong = $_SESSION['GioHang'][$key]['SoLuong'];
                $sanPhamBUS->UpdateSoLuongTon($sanPhamBUS->GetSoLuongTon($masp) + $soLuong, $masp);
            }
        }
    }
    session_destroy();
    header("location:index.php");
?>