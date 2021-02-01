<?php
    if(isset($_GET['masp']))
    {
        if(is_numeric($_GET['masp']))
        {
            $sanPhamBUS = new SanPhamBUS();
            $masp = $_GET['masp'];
            $sanPhamBUS->UpdateSoLuotXem($sanPhamBUS->GetSoLuotXem($masp) - 1, $masp);
            if($sanPhamBUS->GetSoLuongTon($masp) < 1)
            {
                $_SESSION['checkoutstock'] = 1;
                header("location:index.php?a=4&masp=$masp");
            }
            else
            {
                    $gioHangBUS = new GioHangBUS();
                    $gioHangBUS->Insert($masp);
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