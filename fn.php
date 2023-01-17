<?php

if (!function_exists('load_env')) {
    function load_env() {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();
    }
}