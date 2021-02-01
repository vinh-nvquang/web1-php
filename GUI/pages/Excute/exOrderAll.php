<?php
    if(isset($_SESSION['GioHang']))
    {
        $gioHang = new GioHangBUS();
        $total = 0;
        $sanPhamBUS = new SanPhamBUS();
//tính tổng tiền
        foreach($_SESSION['GioHang'] as $key=>$value)
        { 
            $masp = $_SESSION['GioHang'][$key]['MaSanPham'];
            $soluong =  $_SESSION['GioHang'][$key]['SoLuong'];
            $sanPham = $sanPhamBUS->GetByID($masp);
            $tien = $soluong*$sanPham->GiaSanPham;
            $total += $tien;
        }
//tạo và insert dondathang vao database
        $donDatHangBUS = new DonDatHangBUS();
        $donDatHang = new DonDatHangDTO();
        $donDatHang->MaDonDatHang = $gioHang->CreateID();
        $now = getdate();
        $donDatHang->NgayLap = $now['year']."-".$now['mon']."-".$now['mday']."-".$now['hours']."-".$now['minutes']."-".$now['seconds'];
        $donDatHang->TongThanhTien = $total;
        $donDatHang->MaTaiKhoan = $_SESSION['uid'];
        $donDatHang->MaTinhTrang = 1;
        $donDatHangBUS->Insert($donDatHang);
        $machitiet = (int)$donDatHang->MaDonDatHang * 100;
        $chiTietDonHang = new ChiTietDonDatHangDTO();
        $chiTietDonHangBUS = new ChiTietDonDatHangBUS();
///tạo và insert chitietdondathang vao database - update soluongban trong sanpham
        foreach($_SESSION['GioHang'] as $key=>$value)
        { 
            $masp = $_SESSION['GioHang'][$key]['MaSanPham'];
            $machitiet = $machitiet + 1;
            $chiTietDonHang->MaChiTietDonDatHang = (string)($machitiet);
            $chiTietDonHang->SoLuong =  $_SESSION['GioHang'][$key]['SoLuong'];
            $chiTietDonHang->GiaBan = $sanPhamBUS->GetByID($_SESSION['GioHang'][$key]['MaSanPham'])->GiaSanPham;
            $chiTietDonHang->MaDonDatHang = $donDatHang->MaDonDatHang;
            $chiTietDonHang->MaSanPham = $_SESSION['GioHang'][$key]['MaSanPham'];
            $check = $chiTietDonHangBUS->Insert($chiTietDonHang);
            $sanPhamBUS->UpdateSoLuongBan($_SESSION['GioHang'][$key]['SoLuong'], $masp);
        }
        unset($_SESSION['GioHang']);
        if($check == true)
        {
            $_SESSION['checktrue'] = 1;
            header("location:index.php?a=12");
        }
        else
        {
            $_SESSION['checkfalse'] = 1;
            header("location:index.php?a=12");
        }
    }
    else
    {
        $_SESSION['checkcartnull'] = 1;
        header("location:index.php?a=12");
    }
?>