<?php
$webroot ='/app/webroot';
echo $this->Html->script($webroot . '/vendor/jquery/jquery.min.js');
echo $this->Html->script($webroot . '/vendor/bootstrap/js/bootstrap.min.js');
echo $this->Html->script($webroot . '/vendor/metisMenu/metisMenu.min.js');
echo $this->Html->script($webroot . '/dist/js/sb-admin-2.js');
echo $this->fetch('script');
?>