<?php
require "Model/users.php";
/**
 * @var PDO $pdo
 */

if (isset($_GET['action']) && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = cleanString($_GET['id']); // nettoyage des données

    switch ($_GET['action']) {
        case 'toggle_enabled':
            toggleEnabled($pdo, $id);
            header("Location: index.php?component=users");
            exit;

        case 'delete':
            break;
    }
}

if (isset($_GET['delete_id']) && is_numeric($_GET['delete_id'])) {
    $idToDelete = $_GET['delete_id'];

    $deleted = delete($pdo, $idToDelete);
    if ($deleted) {
        header("Location: index.php?component=users");
        exit;
    } else {
        $errors[] = "Impossible de supprimer cet utilisateur.";
    }
}

$users = GetAll($pdo);

require 'View/users.php';
