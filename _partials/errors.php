<?php if(!empty($errers)): ?>
    <?php foreach($errers as $value): ?>
        <div class="alert alert-danger mt-2" role="alert">
            <?php echo $value; ?>
        </div>
    <?php endforeach;?>
<?php endif;?>