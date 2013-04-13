<?php

    require_once 'config.php';

    function default_salt_and_hash( $pass ) {
        global $default_hash_type;
        $salted = default_salt_password( $pass );
        return hash( $default_hash_type, $salted );
    }

    function default_salt_password( $pass ) {
        global $default_salt_start;
        global $default_salt_end;
        return $default_salt_start . $pass . $default_salt_end;
    }

?>
