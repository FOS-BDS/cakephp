<?php
App::uses('AppController', 'Controller');

class AdministratorsController extends AppController{


	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->layout = 'default_bootstrap';
	}

	public function readLog($name = null)
	{
        echo $name;
		if ($name) {
			$lines = $this->request->query('lines');
			if (empty($lines))
				$lines = 100;

			ob_start();
			passthru("tail -n $lines " . TMP . 'logs' . DS . $name, $result);
			$content = ob_get_clean();
			$this->set(compact('content'));
		}
	}


	public function readLog2($name = null)
	{
		if ($name) {
			$lines = $this->request->query('lines');
			if (	empty($lines)
				&& ($this->request->query('scopes') || $this->request->query('type'))
			) {
				$lines = 1000000;
			}			
			if (empty($lines))
				$lines = 200;

			ob_start();
			if (!$this->request->query('type') && !$this->request->query('scopes') && !$this->request->query('search')) {
				passthru("tail -n $lines " . '/var/log/td-agent/' . $name, $result);
			} else {
				if ($this->request->query('search')) {
					$keyword = $this->request->query('search');
					passthru("cat /var/log/td-agent/". $name . " | grep '$keyword'", $result);
				} elseif ($this->request->query('scopes')) {
					$scopes = $this->request->query('scopes');
					passthru("tail -n $lines " . '/var/log/td-agent/' . $name . " | grep '\"scopes\":\"$scopes\"'", $result);
				} elseif ($this->request->query('type')) {
					$type = $this->request->query('type');
					passthru("tail -n $lines " . '/var/log/td-agent/' . $name . " | grep '\"type\":\"$type\"'", $result);
				}
			}
			$content = ob_get_clean();

			// count lines in file
            ob_start();
            passthru("wc -l " . '/var/log/td-agent/' . $name, $donothing);
            $result = ob_get_clean();
            $totalLine = explode(' ', $result);
            $totalLine = $totalLine[0];

			$this->set(compact('content', 'lines', 'totalLine'));
		}
	}

	public function admin_clearLogs()
	{
		exec('cat /dev/null > ' . TMP . 'logs' . DS . 'info.log');
		exec('cat /dev/null > ' . TMP . 'logs' . DS . 'debug.log');
		exec('cat /dev/null > ' . TMP . 'logs' . DS . 'error.log');
		exec('cat /dev/null > ' . TMP . 'logs' . DS . 'request.log');
		exec('cat /dev/null > ' . TMP . 'logs' . DS . 'apns.log');
		$this->Session->setFlash('Đã xóa trắng 3 files : debug và error, info log','success');
		$this->redirect(array('action' => 'index'));
	}
}
