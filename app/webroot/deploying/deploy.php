<style type='text/css'>
    body {font-size : 13px;}
    h1 small, h2 small, h3 small, h4 small {font-weight: normal;font-size: 13px;color: #888;}
</style>

<h2>Projects Deploying : <small><?php echo microtime(true)?></small></h2>
<?php
if (extension_loaded('newrelic')) {
	newrelic_end_of_transaction(); // dont record this request to newrelic
}
require 'config.php';
require 'functions.php';
$hidden = is_file(__DIR__ . '/hiddenconfig');
$domain = $_SERVER['HTTP_HOST'];
?>
<ul>
<?php
# List project on this server
$nothing = true;
foreach($projects as $project) {
    if (    (is_string($project['domain']) && $domain == $project['domain'])
        ||  (is_array($project['domain']) && array_search($domain, $project['domain']) !== false)
    ) {

        $nothing = false;
?>
        <li>
            <a href='?project=<?php echo $project['project'] ?>'>
                <?php
                echo $project['project'];
                ?>
            </a>
            <?php
            if ($project['project']) {
                if (!empty($_GET['project']) && $_GET['project'] == $project['project']) {
                    echo ' <---';
                }
            }
            ?>
        </li>
<?php

        if (!empty($_GET['project']) && $_GET['project'] == $project['project']) {
            $cur = $project;
        }
    }
}
if ($nothing) {
    echo "<em>Don't have project on this server, or you don't config it yet.</em>";
}
?>
</ul>
<?php

# after when selected project 
if (!empty($cur)) {
    $APP = $cur['directory'];
    if (!is_dir($APP)) {
        echo "<em>Invalid path, check directory path again.</em>";
        exit();
    }
    chdir($APP);
    ?>
    <form method='POST'>
        <input name='hello' type='hidden' value='hello'/>
        <?php echo $cur['server_name'] ?><input type='submit' style='margin: 8px 15px;font-weight: bold' value='Deploy'/>
    </form>
    <?php
    $currentBranch = run('git rev-parse --abbrev-ref HEAD', false);
    $cur['branch'] = $currentBranch[0][0];

    # List branches remote
    if ($hidden) {
        echo '<h2>Switch branches</h2>';
        run('git remote update -p origin', false);
        $result = run("sudo git branch -r");
        debug($result);
        echo '<ul>';
        foreach ($result[0] as $key => $branch) {
            $branch = trim($branch);
            echo "<li><a href='{$_SERVER['SCRIPT_NAME']}?project={$cur['project']}&branch={$branch}'>" . $branch . "</a></li>";
            
        }
        echo '</ul>';

        # Switch Branch
        if (!empty($_GET['branch'])) {
            
            $branchName = str_replace('origin/', '', $_GET['branch']);
            if ($branchName != $currentBranch[0][0]) {
                $result = run("git checkout $branchName", false);
                if ($result[1] != 0) {
                    run("git checkout -b $branchName $branch", true);
                }
                echo '<em>Switched!</em>';
            }

        }
    }

    # Current Branch
    echo '<h2>Current branch</h2>';
    run('git rev-parse --abbrev-ref HEAD', true);
    ?>
    <h2>Current Status <small><?php echo microtime(true)?></small></h2>
    <code><?php echo $cur['project'] ?>, <?php echo $cur['server_name'] ?>, <?php echo $cur['directory'] ?></code><br/>
    <code><?php echo "git diff --stat HEAD...{$cur['remote']}/{$cur['branch']}" ?></code>

    <?php

    if (empty($_POST)) {
        # Get diff with remote branch
        run("git remote update {$cur['remote']}");
        list($output, $return) = run("git diff --stat HEAD...{$cur['remote']}/{$cur['branch']}", true);
        if (empty($output)) {
            echo 'This branch already up-to-date';
        }
    } else {

        # Perform deloying
        echo '<h2>Deployed status <small>' . microtime(true) . '</small></h2>';
        $all = false;
        if ($hidden) {
            $all = true;
        }
        deploy($cur, true, $all);
    }

    echo '<h2>Current branch\'s commit logs <small>' . microtime(true) . '</small></h2>';
    run('git --no-pager log --date=relative --since="2 weeks ago" --date-order --full-history --all --pretty=tformat:"%ad%x09%h%x09%x09%ae%x09%x09%s "' . $cur['branch'], true);
    echo '--- end ---';
    a:
}
?>
