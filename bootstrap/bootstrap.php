<?php

$root_dir = __DIR__ . '/../';
require "$root_dir/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable($root_dir);
$dotenv->load();

