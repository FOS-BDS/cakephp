<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->element('meta');
        echo $this->element('script');
	?>
</head>
<body>
<div id="wrapper">
    <?php echo $this->element('nav'); ?>
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
