<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    
    <title>Contract</title>
</head>
<body>
<?php
$token = $_GET['token'];

include('dbcon.php');
$ref = "rentagreement/";
$getdata = $database->getReference($ref)->getChild($token)->getValue();
?>
    <div  id="tblCustomers" style="margin-left: 17em; ">
<div style="margin-top: 2em;">
    <img src="img/na-rent-to-own-homes-removebg-preview.png" alt="" width="10%"><h2 style="margin-left: 8.5em; margin-top: 1em; margin-bottom: 2em;">Rent to Own Agreement</h2>
</div>
<div style=" margin-top: 2em;">
<p>This is a legally binding agreement. It is intended to promote household harmony by clarifying the expectations </br>
and responsibilities of the homeowner or principal tenant (landlord) and tenant when they share the same home.</br>
 All parties shall receive a copy of this document.</p>
 <h3 style="margin-top: 1em; margin-bottom: 2em;">Rent Unit Located At</h3>
 <h3 style="margin-top: 1em; margin-bottom: 2em;"><?php echo $getdata['location']; ?></h3>
 <div style="margin-top: -2.3em;">Address</div>
 <h3 style="margin-top: 1.5em; margin-bottom: 2em;">Parties</h3>
 <div>
 <div style="margin-top: -1.3em;">Investor/Landlord</div>
 <h3 style="margin-top: 1em; margin-bottom: 2em;"><?php echo $getdata['investorname']; ?></h3>
</div>
<div style="margin-left: 19em; margin-top: -6.2em;">
 <div style="margin-top: -1.3em;">Tenant</div>
 <h3 style="margin-top: 1em; margin-bottom: 2em;"><?php echo $getdata['rentername']; ?></h3>
</div>
<h3 style="margin-top: 1.5em; margin-bottom: 2em;">Rent</h3>
<p style="margin-top: -1.9em; margin-bottom: 2em;"><b>$</b>&nbsp<b>350</b>, payable monthly on the &nbsp 1 &nbsp day of the month, made payable to</br>
<b><?php echo $getdata['rentername']; ?></b> house Id: <b><?php echo $getdata['houseno']; ?></b></p>
<h3 style="margin-top: 1em; margin-bottom: 2em;">Deposit</h3>
 <div>
 <div style="margin-top: -1.9em;">Security Deposit:       Paid on &nbsp<?php echo $getdata['date']; ?>&nbsp Amount $ &nbsp 350</div>
 <p>The Security deposit may be used for the purpose of repairing damage for which the tenant is responsible </br>
 (beyond normal wear and tear), cleaning, or paying unpaid rent or utilities. </br> </br>The Owner and the Renter shall
  conduct a pre-move out inspection of the rental BEFORE the Renter moves </br>out at which time the 
Owner shall inform the Renter of need repairs. </br></br> The Renter shall have the right to make any repairs
identified at the pre-move out inspection at his or her expense.</p>
</div>
<h3 style="margin-top: 1.5em; margin-bottom: 2em;">Signature</h3>
 <div>
 <div style="margin-top: -1.3em;"><?php echo $getdata['investorname']; ?></div>
 <h3 style="margin-top: 1.5em; margin-bottom: 2em;">............................................</h3>
 
</div>
<div style="margin-left: 19em; margin-top: -6.5em;">
 <div style="margin-top: -1.3em;"><?php echo $getdata['rentername']; ?></div>
 <h3 style="margin-top: 1.5em; margin-bottom: 2em;">............................................</h3>
 
</div>
<h3 style="margin-top: 1.5em; margin-bottom: 2em;">Date</h3>
 <div>
 <div style="margin-top: -1.3em;"><?php echo $getdata['date']; ?></div>
</div>

</div>
</div>
<div style="margin-top: 1em; margin-left: 19em;">
<button id="btnExport" style="width: 22em; height: 2em; background: #7499E8; border-radius: 10px; border: 1px solid #7499E8; color: white; font-size: .8rem; "> Generate Contract</button>
<button  style="width: 22em; height: 2em; background: grey; border-radius: 10px; border: 1px solid grey; color: white; font-size: .8rem; "> <a href="rentagree.php" style="text-decoration: none;">Close</a></button>

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
                    pdfMake.createPdf(docDefinition).download("Rent Agreement.pdf");
                }
            });
        });
    </script>
</body>
</html>