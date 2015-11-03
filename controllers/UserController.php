<?php

require_once __DIR__ . '/../libs/Smarty.class.php';

class UserController
{
	private $model;
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

		require_once __DIR__ . '/../models/User.php';
		$this->model = new UserModel();
	}

	public function profileAction()
	{
		$this->user = $this->model->getUserByName($_GET['name']);
		$this->view->assign("screen_name", $this->user['screen_name']);
		$this->view->assign("name", $this->user['name']);
		$this->view->assign("profile", $this->user['profile']);
		$this->view->display('profile.tpl');
	}

	public function profileEditAction()
	{
		$this->view->display('profileEdit.tpl');
	}
}