<?php
    if(isset($_SESSION['uid']) && $_SESSION['tuid'])
    {
?> 
    <div id="product">&nbsp;MANUFACTURERS MANAGEMENT</div>
    <div id="Operation">
<?php     
         if(isset($_GET['a']))
         {
?>
            <form action="index.php?a=20" method="Post">
            <input type="text" id=txtsadmi name="tenhangsanxuat"> 
            <input type="submit" value="Search" id="btnsadmin" onclick="location='index.php?a=20';">
<?php
        echo ('<input type="button" value="Insert" id="btniadmin" onclick="location=\'index.php?a=21&id='.$_GET['a'].'\';">');
?>
    </form>
    </div>
<?php
            $hangSanXuatBUS = new HangSanXuatBUS();
            $Admin = new AdminBUS();
            $Admin->SelectTableHangSanXuat($hangSanXuatBUS->GetAll());
            if(isset($_SESSION['deleteexists']))
            {
                echo '<script> alert("You can not delete this manufacturer!"); </script>';
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