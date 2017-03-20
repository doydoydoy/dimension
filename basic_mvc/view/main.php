<?php ob_start(); ?>

<div>
	Welcome to the page <?= $_SESSION['username']; ?>.
</div>

<?php $content = ob_get_clean(); ?>
