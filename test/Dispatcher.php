<?php

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
				$controllerInstance = new AboutController('http://'.$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
				break;
			case 'error':
				$controllerInstance = new ErrorController();
				break;
			case 'help':
				$controllerInstance = new HelpController();
				break;
			case 'library':
				$controllerInstance = new LibraryContorller();
				break;
			case 'logout':
				$controllerInstance = new LogoutController();
				break;
			case 'others':
				$controllerInstance = new OthersController();
				break;
			case 'profile':
				$controllerInstance = new ProfileController();
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