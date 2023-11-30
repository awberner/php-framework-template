<?php

namespace app\config;

class Config
{
    // Database configuration
    const DB_HOST = 'localhost';
    const DB_USER = 'username';
    const DB_PASSWORD = 'password';
    const DB_NAME = 'database';
    const DB_PORT = '1234';

    // Site configuration settings
    const SITE_NAME = 'My Website';
    const SITE_URL = 'http://domain.com';
    const SHIFT_URL = false; // When exploding url, remove first sub folder from values. For example domain.com/sub-folder/public"
    const SHIFT_PUBLIC_URL = true; // When exploding url, remove "public" folder from values."
    const DEFAULT_LANG = "en";

    const DEBUG_MODE = true;
    const VERSION = "1.0.0";

    // Add more configuration settings as needed
}
