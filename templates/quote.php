
<!DOCTYPE html>

<html>

    <head>

        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="/css/styles.css" rel="stylesheet"/>

                    <title>C$50 Finance: Quote</title>
        
        <script src="/js/jquery-1.10.2.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/scripts.js"></script>

    </head>

    <body>

        <div class="container">

            <div id="top">
               
            </div>

            <div id="middle">
<P>
<?php
 // require("../includes/config.php");         
  echo "A share of " . $_SESSION["nameq"];
  
  echo"(".$_SESSION["symbolq"];
  echo")";
  echo"COSTS $".$_SESSION["priceq"];
//print("A SHare of",$_SESSION["name"]);


 ?>
      </P>      </div>

            <div id="bottom">
               
            </div>

        </div>

    </body>

</html>

