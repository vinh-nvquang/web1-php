<?php
    if(isset($_SESSION['uid']) && $_SESSION['tuid'] == 1)
    {
        $donDatHangBUS = new DonDatHangBUS();
        $lst = $donDatHangBUS->GetForChart();
        echo '<h1 id="error"><span style="color:Red">REVENUS SALES</spad><h1>';
        echo '<canvas id="chart" width="100%" height="35%"></canvas>';
        echo '<script>
        var data = '.json_encode($lst).';
        var ngay = [];
        var tongtien = [];
        for(var i in data)
        {
            ngay.push(data[i].NgayLap);
            tongtien.push(data[i].TongTien); 
        }
        var chartdata ={
            labels : ngay,
            datasets : [{
                    label: "Revenus(VND)",
                    backgroundColor : "#48A497",
                    borderColor: "#48A4D1",
                    data : tongtien,
                }]
        }
        var income = document.getElementById("chart").getContext("2d");
        new Chart(income, {
            type: \'bar\',
            data: chartdata
        });</script>';
    }
    else
    {
        header("location:index.php?a=404");
    }
?> 