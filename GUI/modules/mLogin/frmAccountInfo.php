<ul id="frmlogin">
    <li>
    <a href="#">Hello,&nbsp;<?php echo $_SESSION["dname"] ?></a>
    <?php
        if($_SESSION["tuid"] != 1)
        {
            echo "<a href='index.php?a=12'>Shopping Cart</a>";
        }
    ?>
     <?php
        if($_SESSION["tuid"] != 1)
        {
            echo "<a href='index.php?a=112'>Orders History</a>";
        }
    ?>
    <a href="index.php?a=11">Logout</a>
    </li>
</ul>