<?php

require_once __DIR__ . '/../libs/Smarty.class.php';

class UserController
{
	private $view;
	private $url;

	private $user;

	public function __construct($url)
	{
		$this->view = new Smarty();
		$this->view->template_dir = __DIR__ . '/../views';
		$this->view->compile_dir = __DIR__ . '/../templates_c';
		$this->url = $url;
		$this->view->assign("url", $this->url);

		// ログインしているのかチェックする
	}

	public function profileAction()
	{
		$this->view->display('profile.tpl');
	}

	public function profileEditAction()
	{
		$this->view->display('profileEdit.tpl');
	}
}