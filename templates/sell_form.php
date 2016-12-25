
<!DOCTYPE html>

<html>

    <head>

        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="/css/styles.css" rel="stylesheet"/>

                    <title>C$50 Finance: Sell</title>
        
        <script src="/js/jquery-1.10.2.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/scripts.js"></script>

    </head>

    <body>

        <div class="container">

            <div id="top">
               
            </div>

            <div id="middle">
<form action="sell.php" method="post">

    <fieldset>
        <div class="form-group">
         <?php
         echo   "<select class=\"form-control\" name=\"symbol\">";
          echo  "<option value=\"\"></option>";
            
           
            $opt=query("SELECT * FROM tbl WHERE id=?",$_SESSION["id"]);
            
            foreach ($opt as $op)
            {
                echo "<option>".$op["symbol"]."</option>";
                }
              
                    echo  "</select>";
                      ?>
                            
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-defaul">Sell</button>
        </div>
    </fieldset>
     
</form>
            </div>

            <div id="bottom">
                
            </div>

        </div>

    </body>

</html>

