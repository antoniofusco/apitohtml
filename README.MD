README.MD

This application render the journal river in html template

If you want customize the environment variable you can customize the config.php file on the root

This application is versatile because the kind of data that come from the river can be personalized in 
a class named: db/thejournalDb.php
If you have a different json data you can change this class without change other code

All the application is written with MVC design pattern.
In this way it's possible change the graphic template , the db connection , and the kind of data withour refactor all the code.
The core of the application is file index.php that instantiate all the environment variable and autoload all the class.

First of all it's necessary configure this variable in config.php

// Api username
define('API_USR', '');

// api password
define('API_PWD', '');

// Api entry level for all the river
define('API_COMPLETE_URL', '');

// Api entry level for particular river filtered by tag
define('API_PARTIAL_URL', '');

Enjoy