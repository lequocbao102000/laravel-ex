<?php
// URLConfig

$public_path = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http");
$public_path .= "://".$_SERVER['HTTP_HOST'];
$public_path .= '/shop';
$public_path .= '/public';

define ('BASE_URL',$public_path);