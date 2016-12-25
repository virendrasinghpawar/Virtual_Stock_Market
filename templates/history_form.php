
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
<table class="table table-striped">

    <thead>
        <tr>
            <th>Transaction</th>
            <th>Date/Time</th>
            <th>Symbol</th>
            <th>Shares</th>
            <th>Price</th>
        </tr>
    </thead>

    <?php
    $hist=query("SELECT * FROM history WHERE id =?",$_SESSION["id"]);
    foreach($hist as $his)
    {
    echo"<thead> <tr>";
    echo"<th>".$his["transaction"]."</th>";
    echo"<th>".$his["dt"]."</th>";
    echo"<th>".$his["symbol"]."</th>";
    echo"<th>".$his["shares"]."</th>";
    echo"<th>";
    echo"$".$his["price"];
    echo"</th>";
    echo"</tr></thead>";
    }
    
    
    ?>
    
</table>
            </div>

            <div id="bottom">
                
            </div>

        </div>

    </body>

</html>

