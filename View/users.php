<?php
/**
 * @var array $users
 */


?>
<div class="mt-2 mb-2"
    <h1 class="text-center">Liste des utilisateurs</h1>
<div class="row">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Actif</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td>
                    <a href="index.php?compenent=users&action=toggle_enabled&id=<?php echo $user['id']; ?>">
                        <i class="fa-solid <?php echo ($user['enabled'])
                            ? "fa-check text-success"
                            : "fa-solid fa-xmark text-danger" ?> "></i>
                    </a>
                    </td>

                </tr>
            <?php endforeach;?>
        </tbody>
    </table></div>