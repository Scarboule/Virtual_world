<?php 
    session_start();
    require_once 'config.php';

    if(!empty($_POST['email']) && !empty($_POST['password']))
    {
        $email = htmlspecialchars($_POST['email']); 
        $password = htmlspecialchars($_POST['password']);
        $email = strtolower($email);
        $check = $bdd->prepare('SELECT pseudo, email, password, token FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        
        if($row > 0)
        {
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                if(password_verify($password, $data['password']))
                {
                    $_SESSION['user'] = $data['token'];
                    header('Location: index.php');
                    die();
                }else{ header('Location: log-in.php?login_err=password'); die(); }
            }else{ header('Location: log-in.php?login_err=email'); die(); }
        }else{ header('Location: log-in.php?login_err=already'); die(); }
    }else{ header('Location: log-in.php?login_err=empty'); die();}
