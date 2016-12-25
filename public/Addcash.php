<?php
 require("../includes/config.php");
 if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
 if(empty($_POST["amount"]))
 {
apologize("please amount  field");
 }
 if(empty($_POST["Acountno"]))
 {
apologize("please fill Acount no field");
 }
 if(empty($_POST["password"]))
 {
apologize("please fill password field");
 }
 if(!ctype_digit($_POST["amount"]))
 {
 apologize(" Amount must be digit type");
 }
if(!ctype_digit($_POST["Acountno"]))
{
 apologize("Acount no  must be digit type");
}
 query("UPDATE users SET cash = cash + ? WHERE id = ?",$_POST["amount"],$_SESSION["id"]);
 redirect("/");
 
 
 
 }
 else
 render("Add_form.php", ["title" => "ADDCASH"]);
 ?>
