<?php

    require_once 'config.php';

    function default_salt_and_hash( $pass ) {
        $salted = default_salt_password( $pass );
        return hash( $default_hash_type, $salted );
    }

    function default_salt_password( $pass ) {
        return $default_salt_start + $pass + $default_salt_end;
    }

?>
