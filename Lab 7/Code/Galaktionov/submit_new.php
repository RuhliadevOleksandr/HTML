<?php 
    include 'index.php';
    if(isset($_POST['submit_new']))
    {
        $title=$_POST['newFilmName'];
        $year=$_POST['newFilmYear'];
        $discription=$_POST['newFilmDiscription'];
        if($title!=""){
            add_film($con, $title, $year, $discription);
            mysqli_close($con);
        }
        else{
            echo 'invalid film data!';
        }
        //header('Location:index.php'); 
    }
    
    
?>