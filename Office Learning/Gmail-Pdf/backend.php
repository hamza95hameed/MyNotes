<?php

// $b64 = $request->mybase64;
$b64 = $_POST['mybase64'];
# Decode the Base64 string, making sure that it contains only valid characters
$b64 = str_replace("_","/",$b64);
$b64 = str_replace("-","+",$b64);

$bin = base64_decode($b64, true);

# Perform a basic validation to make sure that the result is a valid PDF file
# Be aware! The magic number (file signature) is not 100% reliable solution to validate PDF files
# Moreover, if you get Base64 from an untrusted source, you must sanitize the PDF contents
if (strpos($bin, '%PDF') !== 0) {
throw new Exception('Missing the PDF file signature');
}

# Write the PDF contents to a local file
$fileName = 'inv-'.rand().'-'.time();
file_put_contents('Gmail-files/'.$fileName.'.pdf', $bin);

?>