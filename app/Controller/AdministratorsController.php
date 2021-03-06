<?php
App::uses('AppController', 'Controller');
App::uses('Security', 'Utility');
App::uses('Inflector', 'Utility');
App::uses('Folder', 'Utility');

class AdministratorsController extends AppController{


	public function beforeFilter()
	{
		parent::beforeFilter();
	}

	public function admin_readLog($name = null)
	{
		if ($name) {
            $files = TMP . 'logs' . DS . $name;
            if(is_file($files)){
                $file = new File($files);
                $content = $file->read();
                $this->set(compact('content'));
            }
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
    public function admin_index() {

    }
    public function clear_cache() {
        Cache::clear();
        clearCache();

        $files = array();
        $files = array_merge($files, glob(CACHE . '*')); // remove cached css
        $files = array_merge($files, glob(CACHE . 'css' . DS . '*')); // remove cached css
        $files = array_merge($files, glob(CACHE . 'js' . DS . '*'));  // remove cached js
        $files = array_merge($files, glob(CACHE . 'models' . DS . '*'));  // remove cached models
        $files = array_merge($files, glob(CACHE . 'persistent' . DS . '*'));  // remove cached persistent

        foreach ($files as $f) {
            if (is_file($f)) {
                unlink($f);
            }
        }

        if(function_exists('apc_clear_cache')):
            apc_clear_cache();
            apc_clear_cache('user');
        endif;

        $this->set(compact('files'));
        $this->layout = 'ajax';
    }
}
