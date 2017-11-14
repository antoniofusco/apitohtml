<?PHP

// Configuration
if (is_file('config.php')) {
	require_once('config.php');
}

require_once(DIR_SYSTEM . 'startup.php');

$registry = new Registry();

// Loader
$loader = new Loader($registry);
$registry->set('load', $loader);
// Log
$log = new Log(ERROR_FILE_LOG);
$registry->set('log', $log);

// Db connection
$db = new theJournalDb();
$registry->set('db',$db);

function error_handler($errno, $errstr, $errfile, $errline) {
	global $log, $config;

	// error suppressed with @
	if (error_reporting() === 0) {
		return false;
	}

	switch ($errno) {
		case E_NOTICE:
		case E_USER_NOTICE:
			$error = 'Notice';
			break;
		case E_WARNING:
		case E_USER_WARNING:
			$error = 'Warning';
			break;
		case E_ERROR:
		case E_USER_ERROR:
			$error = 'Fatal Error';
			break;
		default:
			$error = 'Unknown';
			break;
	}

	if (ERROR_DISPLAY) {
		echo '<b>' . $error . '</b>: ' . $errstr . ' in <b>' . $errfile . '</b> on line <b>' . $errline . '</b>';
	}

	if (ERROR_LOG) {
		$log->write('PHP ' . $error . ':  ' . $errstr . ' in ' . $errfile . ' on line ' . $errline);
	}

	return true;
}
// Error Handler
set_error_handler('error_handler');

$request = new Request();
$registry->set('request', $request);

// Response
$response = new Response();
$response->addHeader('Content-Type: text/html; charset=utf-8');
$response->setCompression(COMPRESSION);
$registry->set('response', $response);

if (isset($request->get['__pagina__'])) {
	$action = new Action('home/partialRiver');
} else {
	$action = new Action('home');     
}
 
$controller = new Front($registry);

// Dispatch
$controller->dispatch($action, new Action('not_found'));

// Output
$response->output();