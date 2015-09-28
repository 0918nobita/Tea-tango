<?php

require_once __DIR__ . '/../libs/Smarty.class.php';

class AboutController
{
	private $view;
	private $url;

	public function __construct($url)
	{
		$this->view = new Smarty();
		$this->view->template_dir = __DIR__ . '/../views';
		$this->view->compile_dir = __DIR__ . '/../templates_c';
		$this->url = $url;
		$this->view->assign("url", $this->url);
	}

	public function displayAction()
	{
		$this->view->display('about.tpl');
	}
}