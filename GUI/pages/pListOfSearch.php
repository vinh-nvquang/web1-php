<?php
if(isset($_GET['a']))
{
    if(isset($_GET['search']))
    {
        echo '<h3>SEARCH FOR: "'.$_GET['search'].'"</h3>';
        if($_GET['search'] == "")
        {
            echo '<h1 id="error">Product not found</h1>';   
        }
        else
        {
            $sanPhamBUS = new SanPhamBUS();
            $lst = $sanPhamBUS->GetByName($_GET['search']);
            if(count($lst) <=0)
            {
                echo '<h1>Product not found</h1>';
            }
            else
            {
                echo '<div id="Operation">';

                echo '<form name="frmsearch" action="index.php?a=130&search='.$_GET['search'].'" method="POST">'
?>
                <select class="esearch" id="etype" name="typeproduct">
                <option value="0">Type of Product</option>    
<?php
                $loaiSanPhamBUS = new LoaiSanPhamBUS();
                $lstLoaiSanPham = $loaiSanPhamBUS->GetAllAvailable();
                foreach($lstLoaiSanPham as $loaiSanPham)
                {
                    echo '<option value="'.$loaiSanPham->MaLoaiSanPham.'">'.$loaiSanPham->TenLoaiSanPham.'</option>';
                }
?>            
                </select>
                <select class="esearch" name="manufacturer">
                <option value="0">Manufacturer</option>    
<?php
                $hangSanXuatBUS = new HangSanXuatBUS();
                $lstHangSanXuat = $hangSanXuatBUS->GetAllAvailable();
                foreach($lstHangSanXuat as $hangSanXuat)
                {
                    echo '<option value="'.$hangSanXuat->MaHangSanXuat.'">'.$hangSanXuat->TenHangSanXuat.'</option>';
                }
?>            
                </select>
                <select class="esearch"  id="eprice" name="price">
                <option value="0">Price</option>
                <option value="1">0 - 5000000</option>
                <option value="2">5000000  - 10000000</option>
                <option value="3">10000000 - 20000000</option> 
                <option value="4">20000000 - 30000000</option>
                <option value="5">>40000000</option>                
                </select>

                <input type="submit" value="Search" id="btn" name="ssubmit">
                </form>
<?php
                echo '</div>';
                foreach($lst as $sanPham)
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
?>