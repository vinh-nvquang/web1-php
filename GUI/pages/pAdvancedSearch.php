<?php
if(isset($_GET['a']))
{
    if(isset($_GET['search']) && isset($_GET['type']) && isset($_GET['manufacturer']) && isset($_GET['price']))
    {
        echo '<h3><a id="back" onclick="ComeBack()">&lt;&lt;</a>&nbsp;&nbsp;ADVANCED SEARCH FOR: "'.$_GET['search'].'"</h3>';
        $type = $_GET['type'];
        $man = $_GET['manufacturer'];
        $price = $_GET['price'];
        if($type == 0)
        {
            if($man == 0)
            {
                if($price == 0)
                {
                    $sanPhamBUS = new SanPhamBUS();
                    $lst = $sanPhamBUS->GetByName($_GET['search']);
                    if(count($lst) <= 0)
                    {
                        echo '<h1 id="error">Product not foundaa</h1>';
                    }
                    else
                    {
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
                else
                {
                    /////code
                    $max = 0;
                    $min = 0;
                    if($price == 1)
                    {
                        $min = 0;
                        $max = 5000000;
                    }
                    else if($price == 2)
                    {
                        $min = 5000000;
                        $max = 10000000;
                    }
                    else if($price == 3)
                    {
                        $min = 10000000;
                        $max = 20000000;
                    }
                    else if($price == 4)
                    {
                        $min = 20000000;
                        $max = 30000000;
                    }
                    else if($price == 5)
                    {
                        $min = 40000000;
                        $max = 400000000;
                    }
                    else
                    {
                        header("location:index.php?a=404");
                    }
                    $sanPhamBUS = new SanPhamBUS();
                    $lst = $sanPhamBUS->GetByNameAndPrice($_GET['search'], $max, $min);
                    if(count($lst) <=0)
                    {
                        echo '<h1 id="error">Product not found</h1>';
                    }
                    else
                    {
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
                if(is_numeric($man))
                {
                    if($price == 0)
                    {
                        $sanPhamBUS = new SanPhamBUS();
                        $lst = $sanPhamBUS->GetByNameAndManufacturer($_GET['search'], $man);
                        if(count($lst) <=0)
                        {
                            echo '<h1 id="error">Product not found</h1>';
                        }
                        else
                        {
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
                    else
                    {
                        $max = 0;
                        $min = 0;
                        if($price == 1)
                        {
                            $min = 0;
                            $max = 5000000;
                        }
                        else if($price == 2)
                        {
                            $min = 5000000;
                            $max = 10000000;
                        }
                        else if($price == 3)
                        {
                            $min = 10000000;
                            $max = 20000000;
                        }
                        else if($price == 4)
                        {
                            $min = 20000000;
                            $max = 30000000;
                        }
                        else if($price == 5)
                        {
                            $min = 40000000;
                            $max = 400000000;
                        }
                        else
                        {
                            header("location:index.php?a=404");
                        }
                        $sanPhamBUS = new SanPhamBUS();
                        $lst = $sanPhamBUS->GetByNameAndPriceAndManufacturer($_GET['search'], $max, $min, $man);
                        if(count($lst) <= 0)
                        {
                            echo '<h1 id="error">Product not found</h1>';
                        }
                        else
                        {
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
        }
        else
        {
            ///////code
            if(is_numeric($type))
            {
                if($man == 0)
                {
                    if($price == 0)
                    {
                        $sanPhamBUS = new SanPhamBUS();
                        $lst = $sanPhamBUS->GetByNameAndType($_GET['search'], $type);
                        if(count($lst) <=0)
                        {
                            echo '<h1 id="error">Product not found</h1>';
                        }
                        else
                        {
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
                    else
                    {
                        /////code
                        $max = 0;
                        $min = 0;
                        if($price == 1)
                        {
                            $min = 0;
                            $max = 5000000;
                        }
                        else if($price == 2)
                        {
                            $min = 5000000;
                            $max = 10000000;
                        }
                        else if($price == 3)
                        {
                            $min = 10000000;
                            $max = 20000000;
                        }
                        else if($price == 4)
                        {
                            $min = 20000000;
                            $max = 30000000;
                        }
                        else if($price == 5)
                        {
                            $min = 40000000;
                            $max = 400000000;
                        }
                        else
                        {
                            header("location:index.php?a=404");
                        }
                        $sanPhamBUS = new SanPhamBUS();
                        $lst = $sanPhamBUS->GetByNameAndPriceAndType($_GET['search'], $max, $min, $type);
                        if(count($lst) <=0)
                        {
                            echo '<h1 id="error">Product not found</h1>';
                        }
                        else
                        {
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
                    if(is_numeric($man))
                    {
                        if($price == 0)
                        {
                            $sanPhamBUS = new SanPhamBUS();
                            $lst = $sanPhamBUS->GetByNameAndManufacturerAndType($_GET['search'], $man, $type);
                            if(count($lst) <=0)
                            {
                                echo '<h1 id="error">Product not found</h1>';
                            }
                            else
                            {
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
                        else
                        {
                            $max = 0;
                            $min = 0;
                            if($price == 1)
                            {
                                $min = 0;
                                $max = 5000000;
                            }
                            else if($price == 2)
                            {
                                $min = 5000000;
                                $max = 10000000;
                            }
                            else if($price == 3)
                            {
                                $min = 10000000;
                                $max = 20000000;
                            }
                            else if($price == 4)
                            {
                                $min = 20000000;
                                $max = 30000000;
                            }
                            else if($price == 5)
                            {
                                $min = 40000000;
                                $max = 400000000;
                            }
                            else
                            {
                                header("location:index.php?a=404");
                            }
                            $sanPhamBUS = new SanPhamBUS();
                            $lst = $sanPhamBUS->GetByNameAndPriceAndManufacturerAndType($_GET['search'], $max, $min, $man, $type);
                            if(count($lst) <= 0)
                            {
                                echo '<h1 id="error">Product not found</h1>';
                            }
                            else
                            {
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
?>