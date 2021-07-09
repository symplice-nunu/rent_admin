<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent to Own Admin</title>
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
                    <a href="inde.php"><span class="las la-igloo"></span>
                        <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="rentagree.php" class="active"><span class="las la-clipboard"></span>
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
                    <a href="renters.php" ><span class="lab la-google-wallet"></span>
                        <span>Cancel Rent Agreement</span></a>
                </li>
                <!-- <li>
                    <a href=""><span class="las la-clipboard-list"></span>
                        <span>About</span></a>
                </li> -->
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"> </span>

                </label>
                Rent Agreement

            </h2>
            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" id="myInput" onkeyup="myFunction()" placeholder="Search here" />
            </div>
            <div class="user-wrapper">
                <img src="img/nana.jpg" width="40px" height="40px" alt="">
                <div>
                    <h4>Symplice</h4>
                    <small>Super Admin</small>
                </div>
            </div>
        </header>
        <div class="col-md-12">
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] != "") {
    ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    <?php
    unset($_SESSION['status']);
}
?>
</div>
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
                    $ref = "cancelrents/";
                    $totalrentagreement = $database->getReference($ref)->getSnapshot()->numChildren();
                    ?>
                    <div>
                        <h1>
                        <?php echo $totalrentagreement; ?>
                        </h1>
                        <span>Cancel rent agreement Total Request</span>
                    </div>
                    <div>
                        <span class="lab la-google-wallet">

                        </span>
                    </div>
                </div>

            </div>
            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Rent Agreement</h3>
                            <button id="btnExport">R.A Report<span class="las la-download">
                                <!--  -->
                               

                                </span>
                            </button>

                        </div>
                        <div class="card-body" id="tblCustomers">
                        <?php
                    include('dbcon.php');
                    $ref = "rentagreement/";
                    $totalcancelrents = $database->getReference($ref)->getSnapshot()->numChildren();
                    ?>
                            <div><img src="img/na-rent-to-own-homes-removebg-preview.png" alt="" width="10%"><h3 style="margin-left: 10.5em; margin-top: 1em; margin-bottom: 2em;">Rent Agreement List (<?php echo $totalcancelrents; ?>)</h3></div>
                            
                            
                            <table width="100%" id="myTable">
                                <thead>
                                    <tr>
                                        <td>Investor Name</td>
                                        <td>Renter Name</td>
                                        <td>House ID</td>
                                        <td>House Location</td>
                                        <td>Date</td>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
include('dbcon.php');
$ref = "rentagreement/";
$fetchdata = $database->getReference($ref)->getValue();
$i = 0;
if ($fetchdata > 0) {
    # code...

foreach($fetchdata as $key => $row)
{

$i++;
?>
                                    <tr>
                                    <td><?php echo $row['investorname']; ?></td>
                                    <td><?php echo $row['rentername']; ?></td>
                                    <td><?php echo $row['houseno']; ?></td>
                                    <td><?php echo $row['location']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    </tr>
                                    <?php 
}
}
else
{
?>
<tr>
<td colspan="4">Recent Houses Not Available in the Database</td>
</tr>
<?php
}
?>
                                   
                                </tbody>

                            </table>
                            <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
                        </div>
                    </div>

                </div>
                <div class="customers">
                    <div class="card">
                        <div class="card-header">
                            <h3>Total Contracts</h3>
                            <button>
                                 <span class="las la-arrow-down">

                                </span>
                            </button>

                        </div>
                        <div class="card-body">
                        
                        <div class="card-single">
                <?php
                    include('dbcon.php');
                    $ref = "rentagreement/";
                    $totalcancelrents = $database->getReference($ref)->getSnapshot()->numChildren();
                    ?>
                    <div>
                        <h1>
                        <?php echo $totalcancelrents; ?>
                          
                        </h1>
                        <span>Total rent agreement</span>
                    </div>
                    
                    <div>
                        <span class="las la-clipboard">

                        </span>
                    </div>
                </div>
                
                        </div>
                        <table width="100%" style=" margin-top: 0.1em;">
                                <thead>
                                    <tr>
                                        <td>Generate Contract</td>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
include('dbcon.php');
$ref = "rentagreement/";
$fetchdata = $database->getReference($ref)->getValue();
$i = 0;
if ($fetchdata > 0) {
    # code...

foreach($fetchdata as $key => $row)
{

$i++;
?>
                                <tr>
                               <td> <button style="width: 22em; height: 2em; background: #7499E8; border-radius: 10px; border: 1px solid #7499E8; color: white; font-size: .8rem; margin-bottom: 0.6em;"> <a href="editt.php?token=<?php echo $key ?>" style="text-decoration: none; color: #fff; ">Generate Contract</a></button> </td>

</tr>
<?php 
}
}
else
{
?>
<tr>
<td colspan="2">No Action allowed</td>
</tr>
<?php
}
?>
                                </tbody>
                        </table>
                        
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
                            width: 450
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Rent Agreement List.pdf");
                }
            });
        });
    </script>
</body>

</html>