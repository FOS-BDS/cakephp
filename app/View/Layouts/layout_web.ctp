<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->element('meta_web');
        echo $this->element('script');
	?>
</head>
<body>
<div id="wrapper">
    <?php echo $this->element('nav_web'); ?>
    <div id="page-wrapper">
        <?php echo $this->fetch('content'); ?>
    </div>
	<?php echo $this->element('sql_dump'); ?>
</div>
</body>
<?php
echo $this->element('admin_script');
?>
</html>
