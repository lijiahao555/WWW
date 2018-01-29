<?php
$a = str_replace('\\','/',realpath(dirname(__FILE__).'/'))."/".'upload/';
if (!empty($_FILES)) {
	$tempFile = $_FILES['files']['tmp_name'];


	$targetFile = $a . '/' . $_FILES['files']['name'][0];

	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
	$fileParts = pathinfo($_FILES['files']['name'][0]);

	if (in_array($fileParts['extension'],$fileTypes)) {

		move_uploaded_file($tempFile[0],$targetFile);
		echo '1';
	} else {
		echo 'Invalid file type.';
	}
}