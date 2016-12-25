<?php
 require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    if (empty($_POST["symbol"]))
        {
            apologize("You must provide symbol.");
        }
    
          $stock = lookup($_POST["symbol"]);
                                                                                                            // echo$stock["price"];
         $sh=query("SELECT shares FROM tbl WHERE id=? AND symbol=? ",$_SESSION["id"],$_POST["symbol"]);
         if( $stock==false)
          {
           apologize("some error with connection");
           }
          
          foreach($sh[0]as $s)
           {
                       $s;
                      
                   $tsell=$stock["price"] * $s;
                    }
                   
             $cash=query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
           
            
             
             $total=$cash[0]["cash"] + $tsell;
             $buy="BUY";
             $cdate = date("Y-m-d H:i:s");
        
             
          query("UPDATE users SET cash = ? WHERE id =?",$total,$_SESSION["id"]);
       query("DELETE FROM tbl WHERE id=? AND symbol=?",$_SESSION["id"],$_POST["symbol"]);
       query("INSERT INTO history VALUES(?,?,?,?,?,?)",$buy,$cdate,$_POST["symbol"],$s,$stock["price"],$_SESSION["id"]); 
  
        redirect("/"); 
       
       
    }
    else
     render("sell_form.php", ["title" => "Sell"]);
?>
