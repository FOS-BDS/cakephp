<?php
$webroot = $this->webroot;
echo $this->Html->script($webroot . '/js/jquery-3.2.0.min.js');
echo $this->Html->script($webroot . '/js/ckeditor/ckeditor.js');
echo $this->fetch('script');
?>