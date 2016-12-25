<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
     //$rows = query("SELECT * FROM quote WHERE symbol = ?", $_POST["symbol"]);
        if (empty($_POST["symbol"]))
        {
            apologize("You must provide your symbol.");
        }
       
         $stock = lookup($_POST["symbol"]);
         
           if( $stock==false)
           {
           apologize("not a valid symbol");
           }
          else
          {
 
         $_SESSION["symbolq"]=$stock["symbol"];
          $_SESSION["priceq"]=$stock["price"];
           $_SESSION["nameq"]=$stock["name"];
          
       
       
  
            
          
            
          render("quote.php",["title"=>"quote"]);
           
     }      
         
          
          }
         
        
       
    else
    {
        // else render form
        render("quote_form.php", ["title" => "Quote"]);
    }

?>
