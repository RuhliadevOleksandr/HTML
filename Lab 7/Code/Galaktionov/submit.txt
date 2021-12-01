<?php
 include 'index.php';

//Working with database
$film=get_film($con);

if(isset($_POST['submit']))
{
   display($film);
} 

?>