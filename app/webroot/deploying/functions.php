<?php

function run($cmd, $print = false)
{
	exec($cmd . "  2>&1", $output, $result);
	if ($print || $result !== 0) {
		echo "<pre>";
		if ($result !== 0) {
			echo $cmd . ": ";
		}
		echo implode("\n", $output);
		echo "</pre>";
	}

//	if ($result != 0) {
//		if (!file_exists(__DIR__ . DIRECTORY_SEPARATOR . 'deploy.log')) {
//			touch(__DIR__ . DIRECTORY_SEPARATOR . 'deploy.log');
//		}
//		file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . 'deploy.log',
//            'UTC'.
//			$result . ": $cmd " . implode("\n", $output) . "\n"
//		, FILE_APPEND);
//	}

	return array($output, $result);
}

function deploy($cur, $print = false, $all = false)
{
	run('git checkout -- .');
    run('git clean -f');
    if (!$all) {
    	run("git pull --rebase", $print);
    } else {
    	run ("git fetch && git rebase --autostash FETCH_HEAD", $print);
    }
    # if this project is cakephp
    if (!empty($cur['type']) && $cur['type'] == 'cakephp') {
        if (	empty($cur['migration'])
        	|| 	(is_string($cur['migration']) && $_SERVER['HTTP_HOST'] == $cur['migration'])
        	||	(is_array($cur['migration']) && in_array($_SERVER['HTTP_HOST'], $cur['migration']))
        ) {
            $migrationLock = "/tmp/" . $cur['project'] . "_migration_lock";
            if (!file_exists($migrationLock)) {
                touch($migrationLock);
                run("cd /var/www/html/cakephp/app;php Console/cake.php Migrations.migration run all --precheck Migrations.PrecheckCondition", $print);
                unlink($migrationLock);
            }
        }
        
        #passthru("cd app; Console/cake Migrations.migration status", $return);
        run("find {$cur['directory']}/app/tmp/cache/models/ -type f -not -name 'empty' | xargs rm -f 2>&1", $print);
    }
}
