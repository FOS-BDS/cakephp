<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
set_time_limit(1000);
$platformServers = array(
    '52.40.209.126'
);

$projects = array(
    array(
        'project' => 'cakephp', # project's name
        'server_name' => 'Amazon EC2', # purpose is just for show, free to change it.
        'domain' => $platformServers,
        'directory' => '/var/tmp/cakephp/', # project directory's path
        'remote' => 'origin', # git remote's name use for pull
        'from' => 'localhost', # where is request that start deploying came from ? ( localhost - on same server, not automatic, github - from github, auto deploy)
        'branch' => 'master', # git branch's name use for pull
        'type' => 'cakephp', # each project type will deploy a particular way
        'migration' => array('52.40.209.126'),
        'composer' => false
    )
);
