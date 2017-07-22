<?php
$this->extend('/Common/blank');
?>
<style type='text/css'>
	pre {
		font-family: monospace;
	}
	.options-title {
		text-align: right;
	}
</style>
<?php
$Folder = new Folder('/var/log/td-agent/');

$types = array(
	'scopes' => array('payment', 'user', 'apns', 'gcm', 'email'),
	'type' => array('info', 'warning', 'error')
);
$logs = $Folder->find("platform\..*\.log", true);
echo "<div class='row'>";
if (!empty( $this->request->params['pass'][0])) {

	echo '<div class="span2 options-title">Scopes </div>';
	echo '<div class="span10"> ';
	foreach ($types as $key => $value) {
		foreach ($value as $k => $v) {
			echo $this->Html->link(ucfirst($v), array('controller' => 'administrators', 'action' => 'readLog2', 'admin' => true, $this->request->params['pass'][0], '?' => array($key => $v)), array('class' => 'btn'));
		}
	}
	echo '</div>';
}

echo '<div class="span2 options-title">Files </div>';
echo '<div class="span10"> ';
foreach($logs as $log) {
	// if (	strpos($log, 'resque') !== false
	// 	&&	$log !== 'resque-worker-error.log'
	// 	&&	$log !== 'resque-' . date('Y-m-d') . '.log'
	// ) {
	// 	continue;
	// }
	echo $this->Html->link($log, array('controller' => 'administrators', 'action' => 'readLog2', 'admin' => true, $log), array('class' => 'btn'));
}
echo '</div>';

if (!empty($this->request->params['pass'][0])) {
	echo '<div class="span2 options-title">Total error</div>';
	echo '<div class="span10"> ';
	echo $totalLine;
	echo '</div>';
	if (empty($content)) {
        echo '<div class="span12">';
		echo '<em>File log không có dữ liệu</em>';
        echo '</div>';
	} else {
		$arrayContents = explode("\n", $content);
		if ($this->request->query("search")) {
			echo '<div class="span2 options-title">';
			echo 'Search total: ';
			echo '</div>';
			echo '<div class="span10">';
			echo count($arrayContents);
			echo '</div>';
		}

		echo '<div class="span2 options-title">';
		echo 'Lastest ' . $lines . ' log';
		echo '</div>';
		echo '<div class="span10"> ';
		echo '<form class="form-inline" method="get">';
		echo '<input name="lines" type="text" placeholder="limit lines in tail command"/>';
		echo '<input name="search" type="text" placeholder="search keyword"/>';
		echo '<input type="submit" class="btn" />';
		echo '</form>';
		echo '</div>';

		echo '<div class="span12">';
		$start = microtime(true);
		echo '<pre>';
		
		foreach ($arrayContents as $key => $line) {

			$arrayLine = explode('	', $line);
			if (!empty($arrayLine[2])) {
				$parsedLine = json_decode($arrayLine[2], true);
				echo '<strong>' . $parsedLine['datetime'] . '</strong><br/>';
				unset($parsedLine['datetime']);
				if (json_last_error() == 0) {
					foreach ($parsedLine as $key => $value) {
						if ($key == 'analyzed_message') {
							continue;
						}
						echo $key . ': ';
						if (is_string($value)) {
							echo h($value);
						} else {
							if ($key == 'scopes') {
								var_dump($value);
							} else {
								print_r($value);
							}
						}
						echo '<br/>';
					}
				}else {
					echo $line;
				}	
			}
			echo '<br/>';
		}
		echo '</pre>';
		echo '</div>';
	}
} else {
	echo '<div class="span12">';
	echo '<em>Choose a file log to read</em>';
	echo '</div>';
}
echo '</div>';
?>
