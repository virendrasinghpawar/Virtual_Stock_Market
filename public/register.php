<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
     $rows = query("SELECT * FROM users WHERE username = ?", $_POST["username"]);
        if (empty($_POST["username"]))
        {
            apologize("You must provide your username.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
        }
        else if(empty($_POST["confirmation"]))
        {
        apologize("write confirmation password.");
        }
         
        else if($_POST["password"]!=$_POST["confirmation"])
        {
        apologize("password not match with above password");
        }  
         else if(count($rows) == 1)
          {
          apologize("user  name already exists");
          }
          
       query("INSERT INTO users (username, hash, cash) VALUES(?, ?, 10000.00)", $_POST["username"], crypt($_POST["password"]));   
          
          $rows = query("SELECT LAST_INSERT_ID() AS id");
            $id = $rows[0]["id"];
          $_SESSION["id"] = $id;

                // redirect to portfolio
                redirect("/");

    }
    else
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

?>
