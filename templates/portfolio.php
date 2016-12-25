
<!DOCTYPE html>

<html>

    <head>

        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="/css/styles.css" rel="stylesheet"/>

                    <title>C$50 Finance: Portfolio</title>
        
        <script src="/js/jquery-1.10.2.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/scripts.js"></script>

    </head>

    <body>

        <div class="container">

            <div id="top">
               
            </div>

            <div id="middle">
 <ul class="nav nav-pills">

    <li><a href="quote.php">Quote</a></li>
    <li><a href="buy.php">Buy</a></li>
    <li><a href="sell.php">Sell</a></li>
    <li><a href="history.php">History</a></li>
    <li><a href="logout.php"><strong>Log Out</strong></a></li>
<li><a href="Addcash.php"><strong>Add Cash</strong></a></li>
</ul>

<table  class="table table-striped">

    <thead>
        <tr>
            <th>Symbol</th>
            <th>Name</th>
            <th>Shares</th>
            <th>Price</th>
            <th>TOTAL</th>
        </tr>
    </thead>

    <thead background-color: #C0C0C0; font-family: 'Times New Roman', Times, serif; font-style: normal>
<?php
$tblss=query("SELECT * FROM tbl WHERE id=?",$_SESSION["id"]);
foreach($tblss as $tbl)
{
$stock=lookup($tbl["symbol"]);
$total=$stock["price"]*$tbl["shares"];
echo"<tr>";
echo"<th>".$tbl["symbol"]."</th>";
echo"<th>".$stock["name"]."</th>";
echo"<th>".$tbl["shares"]."</th>";
echo"<th>";
echo"$".$stock["price"];
echo"</th>";


echo"<th>";
echo"$".$total;
echo"</th>";

echo"</tr>";
}
?>
</thead>
<thead>
    <tr>
     <th>CASH</th>
       <?php
       $ca=query("SELECT * FROM  users WHERE id=?",$_SESSION["id"]);
      echo"<th></th>";
      echo"<th></th>";
      echo"<th></th>";
      echo"<th>";echo"$".$ca[0]["cash"];echo"</th>";
       
       ?>
    </tr>

    </thead>

</table>
            </div>

            <div id="bottom">
               
            </div>

        </div>

    </body>

</html>

