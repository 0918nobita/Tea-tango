<?php

require_once __DIR__ . '/../libs/Smarty.class.php';

class WordbookController
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

	// 単語帳の詳細画面
	public function detailAction()
	{
	}

	// 単語帳のプレテスト画面
	public function pretestAction()
	{		
	}

	// 単語帳の編集画面
	public function editAction()
	{
	}
}