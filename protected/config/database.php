<?php

// This is the database connection configuration.
return array(
//	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database

	'connectionString' => 'mysql:host=JXSQ-rm-bp1fg2aan1t7v675h.mysql.rds.aliyuncs.com:3306;dbname=jxhd',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => 'jxhd_test123',
	'charset' => 'utf8',
);