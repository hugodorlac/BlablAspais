<?php



$action = $_GET['action'];
switch($action) {
    case 'validerPassword':
        $login=$_POST['login'];
        $mdp=$_POST['mdp'];
        $unUser = UserDb::getLoginUser($login, $mdp);
        if(is_array($unUser)){
            $_SESSION['connect']=true;
            $_SESSION['id']=$unUser['id'];
            $unUser['nom'];
            $unUser['prenom'];
            header ('Location: index.php');
        }
        break;
        
    case 'deconnecter':
        session_destroy();
        header('Location: index.php');
        break;

    case'first':
        UserDb::firstConnect($_SESSION['id']);
        header('Location: index.php');
    break;
    case'tuto':
        UserDb::tuto($_SESSION['id']);
        header('Location: index.php');
        

}