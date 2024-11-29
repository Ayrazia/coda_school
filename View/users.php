<?php
/**
 * @var array $users
 */
?>

<div class="mt-2 mb-2">
    <h1 class="text-center">Liste des utilisateurs</h1>
    <a href="index.php?component=user&action=create">
        <i class="fa-solid fa-user-plus"></i> Ajouter un utilisateur
    </a>
</div>

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
                    <a href="index.php?component=users&action=toggle_enabled&id=<?php echo $user['id']; ?>">
                        <i class="fa-solid <?php echo ($user['enabled'])
                            ? "fa-check text-success"
                            : "fa-solid fa-xmark text-danger"; ?> "></i>
                    </a>
                </td>
                <td>
                    <a href="javascript:void(0);" onclick="openModal(<?php echo $user['id']; ?>)">
                        <i class="fa-solid fa-trash" style="color: #ff0000;"></i>
                    </a>
                    <a href="index.php?component=user&action=edit&id=<?php echo $user['id']; ?>">
                        <i class="fa-solid fa-pen ms-4"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modale de confirmation -->
<div id="confirmationModal" class="modal" style="display:none;">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Êtes-vous sûr de vouloir supprimer cet utilisateur ?</h2>
        </div>
        <div class="modal-buttons">
            <button class="btn-cancel" onclick="closeModal()">Annuler</button>
            <button class="btn-confirm" id="confirmDeleteBtn" onclick="deleteUser()">Confirmer</button>
        </div>
    </div>
</div>

<script>
    function openModal(userId) {
        document.getElementById("confirmationModal").style.display = "block";
        document.getElementById("confirmDeleteBtn").setAttribute('data-user-id', userId);
    }

    function closeModal() {
        document.getElementById("confirmationModal").style.display = "none";
    }

    function deleteUser() {
        var userId = document.getElementById("confirmDeleteBtn").getAttribute('data-user-id');
        window.location.href = "index.php?component=users&delete_id=" + userId;
    }

    window.onclick = function(event) {
        if (event.target === document.getElementById("confirmationModal")) {
            closeModal();
        }
    };
</script>
