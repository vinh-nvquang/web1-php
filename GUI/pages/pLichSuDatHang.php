<?php
if(isset($_SESSION['uid']) && $_SESSION['tuid'] == 2)
{
    echo '<h3>&nbsp;ORDERS HISTORY</h3>';
    $donDatHangBUS = new DonDatHangBUS();
    $lstdonhang = array();
    $lstdonhang = $donDatHangBUS->GetByMaTaiKhoan($_SESSION['uid']);
    if($lstdonhang == null)
    {
        echo "<h1 id='error'>No Orders!!!</h1>";
    }
    foreach($lstdonhang as $donhang)
    {
        echo"<table id='idTable' cellspacing='0'>
        <thead>
            <tr id='history'>
                <th colspan='3'>&nbsp;$donhang->MaDonDatHang ($donhang->NgayLap)</th>
                <th id='hstotal' colspan='2'>Total: $donhang->TongThanhTien&nbsp;</th>
            </tr>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>";
            $chitietBUS = new ChiTietDonDatHangBUS();
            $lst = array();
            $lst = $chitietBUS->GetByMaDonDatHang($donhang->MaDonDatHang);
            foreach($lst as $chitiet)
            { 
                echo "<tr>";
                echo '<td>'.$chitiet->MaChiTietDonDatHang.'</td>';
                $sanPhamBUS = new SanPhamBUS();
                $sanPham = $sanPhamBUS->GetByID($chitiet->MaSanPham);
                echo '<td>'.$sanPham->TenSanPham.'</td>';
                echo '<td>'.$chitiet->GiaBan.'</td>';
                echo '<td>'.$chitiet->SoLuong.'</td>';
                echo '<td>'.$chitiet->SoLuong*$chitiet->GiaBan.'</td>';
                echo '</tr>';
            }
    echo "</tbody></table>";

    }
}
else
{
    header("location:index.php?a=404");
}
?>
