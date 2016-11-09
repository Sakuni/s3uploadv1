<?php
// Bucket Name
$bucket="bucket-name";
if (!class_exists('S3'))require_once('S3.php');

//AWS access info
if (!defined('awsAccessKey'))
    define('awsAccessKey', 'here_give_the_accessKey');
if (!defined('awsSecretKey'))
    define('awsSecretKey', 'here_give_the_secretKey');

//instantiate the class
$s3 = new S3(awsAccessKey, awsSecretKey);

$s3->putBucket($bucket, S3::ACL_PUBLIC_READ);

?>