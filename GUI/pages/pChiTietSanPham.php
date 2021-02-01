<h3>&nbsp;Product Details</h3>
<div id="boxDetail">
    <div id="chitiet">
        <?php
            if(isset($_GET["masp"]))
            {
                $masp = $_GET["masp"];
                $sanPhamBUS = new SanPhamBUS();
                $sanPhamBUS->UpdateSoLuotXem($sanPhamBUS->GetSoLuotXem($masp) + 1, $masp);
                $sanPham = $sanPhamBUS->GetByID($masp);
                if($sanPham == null)
                {
                    header("location:index.php?a=404");
                }
                else
                {
                    $loaiSanPhamBUS = new LoaiSanPhamBUS();
                    $hangSanXuatBUS = new HangSanXuatBUS();
                    $loaiSanPham = $loaiSanPhamBUS->GetByID($sanPham->MaLoaiSanPham);
                    $hangSanXuat = $hangSanXuatBUS->GetByID($sanPham->MaHangSanXuat);
                    echo "<img src='GUI/images/$sanPham->HinhURL'>";
                    echo "<div id='thongtinchitiet'>";
                    echo"<h3>&nbsp;$sanPham->TenSanPham</h3>";
                    echo"<h4>Manufacturer: $hangSanXuat->TenHangSanXuat</h4>";
                    echo"<h4>Product Type: $loaiSanPham->TenLoaiSanPham</h4>";
                    echo"<h4>Amount: $sanPham->SoLuongTon</h4>";
                    echo"<h4>Views: $sanPham->SoLuotXem</h4>";
                    echo "<span><h3>Price: $sanPham->GiaSanPham VND</h3></span>";
                    if(isset($_SESSION["uid"]))
                    {
                        echo "<input type='button' value='ADD TO CART' id='addCart' onclick=\"location='index.php?a=15&masp=$masp';\">";
                    }
        ?>
                </div>
            </div>
        </div>
        <h3>&nbsp;Related Products</h3>
        <div>
            <?php
                $sanPhamBUS = new SanPhamBUS();
                $lstSanPham = $sanPhamBUS-> GetTop5OfHSX_LSP($hangSanXuat->MaHangSanXuat, $loaiSanPham->MaLoaiSanPham);
                foreach ($lstSanPham as $sanPham)
                {
                    echo "
                    <div id='box'>
                        <img src='GUI/images/$sanPham->HinhURL'>
                        <p>$sanPham->TenSanPham</p>
                        <div>
                            $sanPham->GiaSanPham vnd
                        </div>
                        <p><a href='index.php?a=4&masp=$sanPham->MaSanPham'>Detail</a></p>
                    </div>";
                }
                if(isset($_SESSION['checkoutstock']))
                {
                    echo "<script> alert('Out of stock!');</script>";
                    unset($_SESSION['checkoutstock']);
                }
                else if(isset($_SESSION['checkinsertcart']))
                {
                    echo "<script> alert('Add to cart successfully!');</script>";
                    unset($_SESSION['checkinsertcart']);
                }
                else if(isset($_SESSION['checkcartfull'])){
                    echo "<script> alert('Shopping cart is full!');</script>";
                    unset($_SESSION['checkcartfull']);
                }
            }
        }
    ?>
</div>