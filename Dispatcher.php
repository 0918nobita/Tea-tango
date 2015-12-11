<?php

require_once __DIR__ . '/config.php';

class Dispatcher
{
	public function dispatch()
	{
		if (isset($_GET['controller'])) {
			$controller = $_GET['controller'];
		} else {
			$controller = 'about';
		}

		switch ($controller) {
			case 'about':
				require_once __DIR__ . '/controllers/AboutController.php';
				$controllerInstance = new AboutController(SITE_URL);
				break;
			case 'error':
				require_once __DIR__ . '/controllers/ErrorController.php';
				$controllerInstance = new ErrorController(SITE_URL);
				break;
			case 'help':
				require_once __DIR__ . '/controllers/HelpController.php';
				$controllerInstance = new HelpController(SITE_URL);
				break;
			case 'library':
				$controllerInstance = new LibraryContorller();
				break;
			case 'wordbook':
				require_once __DIR__ . '/controllers/WordbookController.php';
				$controllerInstance = new WordbookController(SITE_URL);
				break;
			case 'logout':
				$controllerInstance = new LogoutController();
				break;
			case 'others':
				$controllerInstance = new OthersController();
				break;
			case 'user':
				require_once __DIR__ . '/controllers/UserController.php';
				$controllerInstance = new UserController(SITE_URL);
				break;
			case 'timeline':
				$controllerInstance = new TimelineController();
				break;
		}

		if (isset($_GET['action'])) {
			$action = $_GET['action'] . 'Action';
		} else {
			$action = 'displayAction';
		}

		$controllerInstance->$action();
	}
}

?>