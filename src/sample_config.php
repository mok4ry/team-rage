<?php

# Copy this file into a new file, "config.php"
# Then, in config.php, change the values to reflect your own settings

$db_user = "root";
$db_pass = "dbpass";
$db_name = "team_rage";
$db_hostname = "localhost";

$default_salt_start = "hello";       # added to the beginning of the password
$default_salt_end = "world";         # added to the end of the password
$default_hash_type = "sha256";       # "sha256", "md5", etc.

?>
