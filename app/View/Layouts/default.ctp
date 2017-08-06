<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->element('meta');
		echo $this->fetch('script');
	?>
</head>
<body>
<div id="wrapper">
    <?php echo $this->element('nav'); ?>
    <?php echo $this->fetch('content'); ?>
	<?php echo $this->element('sql_dump'); ?>
</div>
</body>
</html>
