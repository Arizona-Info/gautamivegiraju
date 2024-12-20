<?php
require_once 'admin/code/project.php';

$path = Config::pdfPath.$obj->downloadWorkProfile();
$filename = Config::pdfName;
header('Content-Transfer-Encoding: binary');  // For Gecko browsers mainly
header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($path)) . ' GMT');
header('Accept-Ranges: bytes');  // For download resume
header('Content-Length: ' . filesize($path));  // File size
header('Content-Encoding: none');
header('Content-Type: application/pdf');  // Change this mime type if the file is not PDF
header('Content-Disposition: attachment; filename=' . $filename);  // Make the browser display the Save As dialog
readfile($path);
exit();