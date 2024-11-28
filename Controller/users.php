<?php
require "Model/users.php";
/**
 * @var PDO $pdo
 */
    if (isset($_GET['action']) &&
        isset($_GET['id']) &&
        is_numeric($_GET['id']) )
    {
        $id = cleanString($_GET['id']);


        switch($_GET['action']) {
            case 'toggle_enabled':
                toggleEnabled($pdo, $id);
                header("Location: index.php?component=users");

                break;
                case 'delete':
                    $deleted = delete($pdo, $id);
                    if (!empty ($deleted)) {
                        $errors[] = "impossible de supprimer, il est lier a une personne !";
                    }else{
                    header("Location: index.php?component=users");
                    }
                    break;

        }
     }

    $users = GetAll($pdo);

    require 'View/users.php';