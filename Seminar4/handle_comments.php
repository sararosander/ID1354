<?php
session_start();
include 'includes/connect_DB.php';
$name = $_SESSION['id'];
$recipe = $_SESSION['recipe'];

    if($_POST["submit"]){
        $comment = $_POST["comment"];
        //$recipe1 = $_POST["recipe"];
        $querycomment = "INSERT INTO comments (recipe, user, comment) VALUES ('$recipe','$name','$comment')";
        $resultcomment = mysqli_query($mysqli, $querycomment);
            
    }
        
    else if($_POST["deleteEntry"]){
        $recID = $_POST["commentId"];
        //$recipe1 = $_POST["recipe"];
        if($name == $_POST["user"]){
        $querydelete = "DELETE FROM comments WHERE id = '$recID' AND recipe = '$recipe' AND user = '$name'";
        $resultdelete = mysqli_query($mysqli, $querydelete);
        }
  
        else{
            echo "You're not the owner of this comment, you can't delete it";
        }   
    }
    
    if($_POST["display"]){ 
        $queryget = "SELECT * FROM comments WHERE recipe = '$recipe'";
        $result = mysqli_query($mysqli, $queryget);
     
        while($row = mysqli_fetch_assoc($result))
        {
                echo '<br>';
                echo '<h3>'.$row['user'].'</h3>';
                echo '<p>'.$row['comment'].'</p>'; 
                echo '<br>';
        }       
      }
    
       
