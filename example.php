<?php

require("phpconnect.php");
$phpconnect = new phpconnect();

$auth = ["host" => "ip", // The ip of remote redis server, if you use localhost you don't need it.
         "password" => "password", // The password of remote redis server, if you use localhost you don't need it.
         "port" => "6379", // Default port of redis, if you changed it change this int.
         "default_key" => "data" // The default key, if you not specify a key this will be used.
];
$phpconnect->init("localhost", $auth);

$phpconnect->put_data("This is a test", ""); // This will set the string in the default key.
$phpconnect->put_data("This is a test in another key", "otherkey"); // This will set the string in the selected key.

$phpconnect->put_data(""); // This will get the data from the default key. Output: This is a test
$phpconnect->put_data("otherkey"); // This will get data from the selected key. Output: This is a test in another key