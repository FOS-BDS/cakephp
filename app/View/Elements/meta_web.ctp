<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<?php
    $webroot = $this->webroot;
    echo $this->Html->css($webroot . '/vendor/bootstrap/css/bootstrap.min.css');
    echo $this->Html->css($webroot . '/vendor/metisMenu/metisMenu.min.css');
    echo $this->Html->css($webroot . '/dist/css/sb-admin-2.css');
    echo $this->Html->css($webroot . '/vendor/font-awesome/css/font-awesome.min.css');
    echo $this->Html->css($webroot . '/css/style_web.css');
    echo $this->fetch('css');

?>