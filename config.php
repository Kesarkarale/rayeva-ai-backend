<?php
$env = parse_ini_file(__DIR__ . '/../.env');
define('OPENAI_API_KEY', $env['OPENAI_API_KEY']);
?>