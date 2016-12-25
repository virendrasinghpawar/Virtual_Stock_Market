<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
   if (empty($_POST["symbol"]))
        {
            apologize("You must provide symbol.");
        }
        if (empty($_POST["shares"]))
        {
            apologize("You must provide shares");
        }
        if (!ctype_digit($_POST["shares"]))
        {
            apologize("You must provide valid shares number");
        }
        $stock = lookup($_POST["symbol"]);
        if( $stock==false)
           {
           apologize("not a valid symbol");
           }
           $tbuy=$stock["price"]*$_POST["shares"];
      
        $row=query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
  
  if($tbuy>$row[0]["cash"])
  {
  apologize("you cant afford that");
  }
  $setc=$row[0]["cash"]-$tbuy;
  
  
  
  query("UPDATE users SET cash = ? WHERE id =?",$setc,$_SESSION["id"]);
  
  query("INSERT INTO tbl(id,symbol,shares)VALUES(?,?,?)ON DUPLICATE KEY UPDATE shares=?+VALUES(shares)",$_SESSION["id"],$stock["symbol"],$_POST["shares"],$_POST["shares"]);
   $buy="BUY";
             $cdate = date("Y-m-d H:i:s");
   query("INSERT INTO history VALUES(?,?,?,?,?,?)",$buy,$cdate,$_POST["symbol"],$_POST["shares"],$stock["price"],$_SESSION["id"]);
   redirect("/");
  
  }
     else
    {
        // else render form
        render("buy_form.php", ["title" => "BUY"]);
    }

?>
