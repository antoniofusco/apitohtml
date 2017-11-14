<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

define('DIR_SYSTEM', dirname(__FILE__).'/System/');
define('DIR_DB', dirname(__FILE__).'/db/');
define('DIR_LOGS', dirname(__FILE__).'/logs/');
define('DIR_APPLICATION', dirname(__FILE__)."/");
define('DIR_TEMPLATE', dirname(__FILE__)."/view/");
// 1 = show error
// 0 = do not show error
define("ERROR_DISPLAY",1);
// 1 = write error
// 0 = do not write error
define("ERROR_LOG",1);

//Level of gzip compression from 1 to 9
define("COMPRESSION",9);

// Api username
define('API_USR', '');
// api password
define('API_PWD', '');

// Api entry level for all the river
define('API_COMPLETE_URL', '');
// Api entry level for particular river
define('API_PARTIAL_URL', '');

define('ERROR_FILE_LOG', 'error_log');
