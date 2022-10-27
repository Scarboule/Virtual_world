<?php 
    require_once 'config.php';
    require_once 'function.php';

    if(!empty($_POST['email'])){

        $email = htmlspecialchars($_POST['email']);
        $code = htmlspecialchars(generateRandomString());
        
        $check = $bdd->prepare('SELECT email FROM sponso WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        $email = strtolower($email);
        if($row == 0){
            $insert = $bdd->prepare('INSERT INTO sponso(email, code) VALUES(:email, :code)');
            $insert->execute(array(
            'email' => $email,
            'code' => $code,
            ));
            header('Location:thanks.php?reg_err=success');
            die();
        } else {
            header('Location:thanks.php?reg_err=already');
        }


        //$insert = $bdd->prepare('INSERT INTO sponso(email, code) VALUES(:email, :code)');
        //$insert->execute(array(
        //    'email' => $email,
        //    'code' => $code,
        //));
        //$insert = $bdd->prepare('INSERT INTO modal(email) VALUES(:email)');
        //$insert->execute(array(
        //    'email' => $email,
        //));
        //header('Location:thanks.php?reg_err=success');
        //die();
    }
