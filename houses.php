<?php
include('authentication.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent to Own Admin</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    
    
</head>

<body>
<?php session_start(); ?>
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
                    <a href="rentagree.php"><span class="las la-clipboard"></span>
                        <span>Rent Agreement</span></a>
                </li>
                <li>
                    <a href="houses.php" class="active"><span class="las la-home"></span>
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
                    <a href="users-list.php"><span class="las la-users"></span>
                        <span>Users</span></a>
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
                Houses

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
        
        <main>
            <div class="cards">
            <?php
  if(isset($_SESSION['status']))
  {
    echo "<h4 class='alert alert-success'>".$_SESSION['status']."</h4>";
    unset($_SESSION['status']);
  }
  ?>
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
                    $ref = "houseapplication/";
                    $totalapplication = $database->getReference($ref)->getSnapshot()->numChildren();
                    ?>
                    <div>
                        <h1>
                        <?php echo $totalapplication; ?>
                        </h1>
                        <span>House Applications</span>
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
                        <span>Rent Agreement</span>
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
                            <h3>Recent Houses</h3>
                            <button id="btnExport">Houses Report<span class="las la-download">
                                <!--  -->
                               

                                </span>
                            </button>

                        </div>
                        <div class="card-body" id="tblCustomers">
                        <div><img src="img/na-rent-to-own-homes-removebg-preview.png" alt="" width="10%"><h3 style="margin-left: 12.5em; margin-top: 1em; margin-bottom: 2em;">Houses List</h3></div>
                            
                            
                            <table width="100%" id="myTable">
                                <thead>
                                    <tr>
                                        
                                        <td>House ID</td>
                                        <td>H.Img</td>
                                        <td>Village</td>
                                        <td>Location</td>
                                        <td>Room No</td>
                                        <td>Price</td>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
include('dbcon.php');
$ref = "houses/";
$fetchdata = $database->getReference($ref)->getValue();
$i = 0;
if ($fetchdata > 0) {
    # code...

foreach($fetchdata as $key => $row)
{

$i++;
?>
                                    <tr>
                                    <td><?php echo $row['houseno']; ?></td>
                                    <td> 
                                    <div class="info"><a href="<?php echo $row['imageUrl']; ?>"><img src="<?php echo $row['imageUrl']; ?>" alt="" width="40px" height="40px"></a> </div></td>
                                    
                                    <td><?php echo $row['villagename']; ?></td>
                                    <td><?php echo $row['houselocation']; ?></td>
                                    <td><?php echo $row['roomno']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    </tr>
                                    <?php 
}
}
else
{
?>
<tr>
<td colspan="6">Recent Houses Not Available in the Database</td>
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
                            <h3>Make Changes</h3>
                            <button>
                                 <span class="las la-arrow-down">

                                </span>
                            </button>

                        </div>
                        <div class="card-body">
                            <i></i>
                        <table width="100%" style=" margin-top: 7.7em;">
                                <thead>
                                    <tr>
                                    <td></td>
                                        <td>VIEW</td>
                                        <td>DELETE</td>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
include('dbcon.php');
$ref = "houses/";
$fetchdata = $database->getReference($ref)->getValue();
$i = 0;
if ($fetchdata > 0) {
    # code...

foreach($fetchdata as $key => $row)
{

$i++;
?>
                                <tr>
                                <td> 
                                    <div class="info"> <a href="<?php echo $row['imageUrl']; ?>"><img src="<?php echo $row['imageUrl']; ?>" alt="" width="40px" height="40px"></a></div></td>
                                    
                               
<td> <button style="width: 5em; height: 2em; background: #7499E8; border-radius: 10px; border: 1px solid #7499E8; color: white; font-size: .8rem;"> <a href="edit.php?token=<?php echo $key ?>" style="text-decoration: none; color: #fff; ">View</a></button> </td>

<td> 
<form action="code.php" method="post">
<input type="hidden" name="ref_toke_delete" value="<?php echo $key; ?>">
<button type="submit" name="delete_data" style="width: 5em; height: 2em; background: var(--main-color); border-radius: 10px; border: 1px solid var(--main-color); color: white; font-size: .8rem; margin-top: 7px;" >Delete</button>
</form></td>
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
                            width: 450
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Houses List.pdf");
                }
            });
        });
    </script>
</body>

</html>