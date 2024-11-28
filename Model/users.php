<?php

    function GetAll(PDO $pdo): array
    {
        $res = $pdo->query('SELECT * FROM users');
        $res->execute();
        return $res->fetchAll();
    }

    function toggleEnabled(PDO $pdo, int $id): void
    {
        $res = $pdo->prepare('UPDATE users SET enabled = NOT enabled WHERE id = :id');
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        $res->execute();
    }

    function delete(PDO $pdo, int $id)
    {
        try {
            $res = $pdo->prepare('DELETE FROM users WHERE id = :id');
            $res->bindParam(':id', $id, PDO::PARAM_INT);
            $res->execute();
        }catch (Exception $e){
            return $e->getMessage();
        }
    }

    function edit(PDO $pdo, int $id, string $username, string $email){
        try {
            $res = $pdo->prepare('UPDATE users SET username = :username, email = :email WHERE id = :id');
            $res->bindParam(':username', $username, PDO::PARAM_STR);
            $res->bindParam(':email', $email, PDO::PARAM_STR);
            $res->bindParam(':id', $id, PDO::PARAM_INT);
            $res->execute();
        }catch (Exception $e){
            return $e->getMessage();
        }

    }