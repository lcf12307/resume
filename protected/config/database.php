<?php

// This is the database connection configuration.
return array(
//	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database

	'connectionString' => 'mysql:host=118.24.166.139;dbname=test',
	'emulatePrepare' => true,
	'username' => 'test_user',
	'password' => 'test_user',
	'charset' => 'utf8',
);