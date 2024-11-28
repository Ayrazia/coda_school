<?php if(!empty($errors)): ?>
    <?php foreach($errors as $value): ?>
        <div class="alert alert-danger mt-2" role="alert">
            <?php echo $value; ?>
        </div>
    <?php endforeach;?>
<?php endif;?>