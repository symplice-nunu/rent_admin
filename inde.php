<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent to Own Admin</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"></span><span>Rent To Own</span></h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="inde.php" class="active"><span class="las la-igloo"></span>
                        <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="rentagree.php"><span class="las la-clipboard"></span>
                        <span>Rent Agreement</span></a>
                </li>
                <li>
                    <a href="houses.php"><span class="las la-home"></span>
                        <span>Houses</span></a>
                </li>
                <!-- <li>
                    <a href="requested.php"><span class="las la-shopping-bag"></span>
                        <span>Requested Houses</span></a>
                </li> -->
                <li>
                    <a href="renters.php"><span class="lab la-google-wallet"></span>
                        <span>Cancel Rent Agreement</span></a>
                </li>
                <li>
                    <a href="logout.php"><span class="las la-arrow-right"></span>
                        <span>Sign Out</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"> </span>

                </label>
                Dashboard

            </h2>
            
            <div class="user-wrapper">
                <img src="img/nana.jpg" width="40px" height="40px" alt="">
                <div>
                    <h4>Symplice</h4>
                    <small>Super Admin</small>
                </div>
            </div>
            
                   
        </header>
        <main>
        <div class="cards">
                <div class="card-single">
                <?php
                    include('dbcon.php');
                    $ref = "userFavorites/";
                    $totalfavoritehouses = $database->getReference($ref)->getSnapshot()->numChildren();
                    ?>
                    <div>
                        <h1>
                        <?php echo $totalfavoritehouses; ?>
                          
                        </h1>
                        <span>Favorite Houses</span>
                    </div>
                    <div>
                        <span class="las la-heart">

                        </span>
                    </div>
                </div>
                <div class="card-single">
                    <?php
                    include('dbcon.php');
                    $ref = "houses/";
                    $totalhouses = $database->getReference($ref)->getSnapshot()->numChildren();
                    ?>
                    <div>
                        <h1>
                            <?php echo $totalhouses; ?>
                        </h1>
                        <span>Houses</span>
                    </div>
                    <div>
                        <span class="las la-home">

                        </span>
                    </div>
                </div>
                <div class="card-single">
                <?php
                    include('dbcon.php');
                    $ref = "application/";
                    $totalapplication = $database->getReference($ref)->getSnapshot()->numChildren();
                    ?>
                    <div>
                        <h1>
                        <?php echo $totalapplication; ?>
                        </h1>
                        <span>Requested Houses</span>
                    </div>
                    <div>
                        <span class="las la-archive">

                        </span>
                    </div>
                </div>
                <div class="card-single">
                <?php
                    include('dbcon.php');
                    $ref = "rentagreement/";
                    $totalrentagreement = $database->getReference($ref)->getSnapshot()->numChildren();
                    ?>
                    <div>
                        <h1>
                        <?php echo $totalrentagreement; ?>
                        </h1>
                        <span>rent agreement</span>
                    </div>
                    <div>
                        <span class="las la-clipboard">

                        </span>
                    </div>
                </div>

            </div>
            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            
                            <button><span class="las la-arrow-down">

                                </span>
                            </button>

                        </div>
                        <div class="card-body">
                        <?php
                    include('dbcon.php');
                    $ref = "cancelrents/";
                    $totalcancelrents = $database->getReference($ref)->getSnapshot()->numChildren();
                    ?>
                        <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>
var xValues = ["Houses", "Rent Agreement", "Featured Houses", "Requested Houses", "Cancel Rent Agreement"];
var yValues = [<?php echo $totalhouses; ?>, <?php echo $totalrentagreement; ?>, <?php echo $totalfavoritehouses; ?>, <?php echo $totalapplication; ?>, <?php echo $totalcancelrents; ?>];
var barColors = ["red", "green","blue","orange","brown"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Rent To Own 2021"
    }
  }
});
</script>
                       
                        </div>
                    </div>

                </div>
                <div class="customers">
                    <div class="card">
                        <div class="card-header">
                            <h3></h3>
                            <button><span class="las la-download">

                                </span>
                            </button>

                        </div>
                        <div class="card-body">
                        <canvas id="PieChart" style="width:100%;max-width:600px"></canvas>

<script>
var xValues = ["Houses", "Rent Agreement", "Featured Houses", "Requested Houses", "Cancel Rent Agreement"];
var yValues = [<?php echo $totalhouses; ?>, <?php echo $totalrentagreement; ?>, <?php echo $totalfavoritehouses; ?>, <?php echo $totalapplication; ?>, <?php echo $totalcancelrents; ?>];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("PieChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Rent To Own 2021"
    }
  }
});
</script>
                            
                        </div>
        </main>
    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript">
        $("body").on("click", "#btnExport", function () {
            html2canvas($('#tblCustomers')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 150
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Pending List.pdf");
                }
            });
        });
    </script>
</body>

</html>