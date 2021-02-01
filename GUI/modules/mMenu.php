<ul>
    <li><a href="index.php">Home</a></li>
    <?php
    if(isset($_SESSION["tuid"]) &&  $_SESSION["tuid"] == 1)
    {
        echo "<li><a href='index.php?a=5'>Account</a></li>";
        echo "<li><a href='index.php?a=6'>Product</a></li>";
<<<<<<< Updated upstream
        echo "<li><a href='index.php?a=7'>Type of product</a></li>";
        echo "<li><a href='index.php?a=8'>Manufacture</a></li>";
=======
        echo "<li><a href='index.php?a=7'>Type product</a></li>";
        echo "<li><a href='index.php?a=8'>Manufacturer</a></li>";
>>>>>>> Stashed changes
        echo "<li><a href='index.php?a=9'>Order</a></li>";
    }
    else
    {
        $loaiSanPhamBUS = new LoaiSanPhamBUS();
        $lstLoaiSanPham = $loaiSanPhamBUS->GetAllAvailable();
        foreach ($lstLoaiSanPham as $loaiSanPham)
        {
            echo "<li><a href='index.php?a=2&malsp=$loaiSanPham->MaLoaiSanPham'>$loaiSanPham->TenLoaiSanPham</a>";
        ?>
        <ul id="sub_menu">  
        <?php
        $hangSanXuatBUS = new HangSanXuatBUS();
        $lstHangSanXuat = $hangSanXuatBUS->GetByMaLoaiSanPham($loaiSanPham->MaLoaiSanPham);
        foreach ($lstHangSanXuat as $hangSanXuat)
        {
        echo "<li><a href='index.php?a=2&malsp=$loaiSanPham->MaLoaiSanPham&mahsx=$hangSanXuat->MaHangSanXuat'>$hangSanXuat->TenHangSanXuat</a></li>";
        }
        ?>
        </li>
    </ul>
    <?php
        }
    }
    ?>
</ul>