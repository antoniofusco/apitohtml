<?php
final class Loader {
	private $registry;

	public function __construct($registry) {
		$this->registry = $registry;
	}

	public function controller($route, $args = array()) {
		$action = new Action($route, $args);

		return $action->execute($this->registry);
	}

	public function model($model) {
		$file = DIR_APPLICATION . 'model/' . $model . '.php';
		$class = 'Model' . preg_replace('/[^a-zA-Z0-9]/', '', $model);

		if (file_exists($file)) {
			include_once($file);

			$this->registry->set('model_' . str_replace('/', '_', $model), new $class($this->registry));
		} else {
			trigger_error('Error: Could not load model ' . $file . '!');
			exit();
		}
	}

	public function view($template, $data = array()) {
           
		$file = DIR_TEMPLATE . $template;
                
		if (file_exists($file)) {

			extract($data);

			ob_start();

			require($file);

			$output = ob_get_contents();

			ob_end_clean();

			return $output;
		} else {
			trigger_error('Error: Could not load template ' . $file . '!');
			exit();
		}
	}

}