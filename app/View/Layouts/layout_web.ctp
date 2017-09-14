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
<script src="https://www.gstatic.com/firebasejs/4.3.0/firebase.js"></script>
<?php
echo $this->element('admin_script');

$webroot ='/app/webroot';

echo $this->Html->script($webroot . '/js/jspush.js');
echo $this->fetch('script');
?>
</html>
