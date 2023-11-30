<?php

    // Register an autoloader function to automatically load class files
    spl_autoload_register(function ($filename) {
        // Construct the file path by appending '.php' to the provided class name
        $file = '..' . DIRECTORY_SEPARATOR . $filename . '.php';

        // Check if the server's directory separator is '/'
        if (DIRECTORY_SEPARATOR === '/'):
            // If it is '/', replace backslashes with forward slashes in the file path
            $file = str_replace('\\', '/', $file);
        endif;

        // Check if the file exists
        if (file_exists($file)):
            // If the file exists, require (include) it
            require $file;
        else:
            // If the file does not exist, display an error message
            echo 'Error importing the file!';
        endif;
    });
