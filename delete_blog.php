<?php 
    require_once 'session.php';

    $remove = intval($_POST['remove']);
    if($remove <= 0){
        header('Location:admin.php?reg_err=error');
        die('a');
    }
    
    $req = $bdd->prepare("DELETE FROM blog WHERE id = :article");
    if(!$req){
        header('Location:admin.php?reg_err=error');
        die('n');
    }
    $req->execute(['article' => $remove]);
    header('Location:admin.php?reg_err=success');
    die();