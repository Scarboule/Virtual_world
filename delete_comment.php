<?php 
    require_once 'config.php';

    $remove = intval($_POST['remove']);
    if($remove <= 0){
        header('Location:admin.php?reg_err=error');
        die();
    }
    
    $req = $bdd->prepare("DELETE FROM feedbacks WHERE id = :comment_id");
    if(!$req){
        header('Location:admin.php?reg_err=error');
        die();
    }
    $req->execute(['comment_id' => $remove]);
    header('Location:admin.php?reg_err=success');
    die();