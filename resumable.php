<?php

/** Add autoload php file so that the classes are autoloaded automatically using PSR standard */
require "./vendor/autoload.php";

$config = new \Flow\Config();
/** Set the temporary directory path for the file chunks */
$config->setTempDir("./temp");
$request = new \Flow\Request();

/** Once all the chunks are uploaded then move to the destination upload folder */
$uploadFolder = "./uploads/";
$uploadFileName = uniqid() . "_" . $request->getFileName();
$uploadPath = $uploadFolder . $uploadFileName;

if (\Flow\Basic::save($uploadPath, $config, $request)) {
	/* File uploaded successfully, now you can save the data to database */
} else {
	/* Not final chunk or invalid request. Continue to upload. */
}
