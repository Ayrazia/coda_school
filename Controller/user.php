<?php
/**
 * @var PDO $pdo
 */

require "Model/user.php";
if(
    isset($_GET['id']) &&
    isset($_GET['action'])
){
    $id = $_GET['id'];
    $action = cleanString($_GET['action']);



    if (
        isset($_POST['edit_button'])
    ) {
        $username = cleanString($_POST['username']);
        $email = cleanString($_POST['email']);
        $enabled = $_POST['enabled'] ? 1 : 0;

        updateUser($pdo,$id,$username,$email,$enabled);

        if
        (
            $_POST['password'] != null &&
            $_POST['confirmation'] != null &&
            $_POST['password'] === $_POST['confirmation']
        ){
            $password = password_hash(cleanString($_POST['password']), PASSWORD_DEFAULT);

            updatePassword($pdo,$id,$password);

        }


    }



    $user = user($pdo,$id);
}


require "View/user.php";