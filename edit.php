<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    
    <title>House Details</title>
</head>
<body>
<?php
$token = $_GET['token'];

include('dbcon.php');
$ref = "houses/";
$getdata = $database->getReference($ref)->getChild($token)->getValue();
?>
    <div  id="tblCustomers" style="margin-left: 17em; ">
<div style="margin-top: 1em;">
    <img src="<?php echo $getdata['imageUrl']; ?>" alt="" width="67%" style="height: 20em;"><h2 style="margin-left: 12.5em; margin-top: 1em; color: teal;"><?php echo $getdata['houseno']; ?></h2>
</div>
<div style=" margin-top: 1em;">
<p style="width: 47em;"><?php echo $getdata['housedescription']; ?>.</p>
 <h3 style="margin-top: 1em; margin-bottom: 0.5em;">Located At</h3>
 <h3 style=" margin-bottom: 2em; color: teal;"><?php echo $getdata['houselocation']; ?></h3>
 <div style="margin-top: -2.3em;">Address</div>
 <h3 style="margin-top: 0.5em; margin-bottom: 2em;">Number of Room</h3>
 <div style="margin-top: -1.5em; color: teal;"><?php echo $getdata['roomno']; ?></div>
 <h3 style="margin-top: 1.5em; margin-bottom: 2em;">Number of Saloons</h3>
 <div style="margin-top: -1.3em; color: teal;"><?php echo $getdata['saloonno']; ?></div>
 <h3 style="margin-top: 1.5em; margin-bottom: 2em;">Number of Toilets and Bathroom</h3>
 <div style="margin-top: -1.3em; color: teal;"><?php echo $getdata['tbno']; ?></div>
 <h3 style="margin-top: 1.5em; margin-bottom: 2em;">Number of Kitchen</h3>
 <div style="margin-top: -1.3em; color: teal;"><?php echo $getdata['kitchenno']; ?></div>
 <h3 style="margin-top: 1.5em; margin-bottom: 2em;">Number of Extra Houses</h3>
 <div style="margin-top: -1.3em; color: teal;"><?php echo $getdata['ehouseno']; ?></div>
 <h3 style="margin-top: 1.5em; margin-bottom: 2em;">Village Name</h3>
 <div style="margin-top: -1.3em; color: teal;"><?php echo $getdata['villagename']; ?></div>


</div></div>
<div style="margin-top: 1em; margin-left: 18em;">
<button id="btnExport" style="width: 22em; height: 2em; background: #7499E8; border-radius: 10px; border: 1px solid #7499E8; color: white; font-size: .8rem; "> Generate Contract</button>
<button  style="width: 22em; height: 2em; background: grey; border-radius: 10px; border: 1px solid grey; color: white; font-size: .8rem; "> <a href="houses.php" style="text-decoration: none;">Close</a></button>
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
                            width: 750
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("House Details.pdf");
                }
            });
        });
    </script>
</body>
</html>