<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link href="<?php echo $this->Html->url('/') ?>app/webroot/img/favicon.ico" type="image/x-icon" rel="shortcut icon" />
<?php
    $webroot = '/app/webroot';
    echo $this->Html->css($webroot.'/vendor/bootstrap/css/bootstrap.min.css');
    echo $this->Html->css($webroot.'/vendor/font-awesome/css/font-awesome.min.css');
    echo $this->Html->css($webroot.'/css/style_web.css');
    echo $this->fetch('css');

?>