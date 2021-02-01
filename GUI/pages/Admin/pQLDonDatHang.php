<?php
    if(isset($_SESSION['uid']) && $_SESSION['tuid'])
    {
?> 
    <div id="product">&nbsp;ORDER MANAGEMENT</div>
    <div id="Operation">
<?php     
         if(isset($_GET['a']))
         {
?>
            <form action="index.php?a=20" method="Post">
            <input type="text" id=txtsadmi name="donhang"> 
            <input type="submit" value="Search" id="btnsadmin" onclick="location='index.php?a=20';">
    </form>
    </div>
<?php
         $donDatHangBUS = new DonDatHangBUS();
         $Admin = new AdminBUS();
         $Admin->SelectTableDonDatHang($donDatHangBUS->GetAll());
        if(isset($_SESSION['checkfalse']))
        {
            echo "<script> alert('Update Failed!');</script>";
            unset($_SESSION['checkfalse']);
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