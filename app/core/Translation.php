<?php

namespace app\core;

use app\config\Config;

class Translation
{
    private $translations = [];

    public function __construct()
    {
        // Retrieve the language from the session, default to English if not set
        $this->lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : Config::DEFAULT_LANG;

        // Load translations based on the selected language
        $this->loadTranslations($this->lang);
    }

    private function loadTranslations($language)
    {
        // Replace this with your actual translation file loading logic
        // For example, you might have translation files in JSON format
        $translationFile = '../app/locale/' . $this->lang . '.json';

        if (file_exists($translationFile)) {
            $this->translations = json_decode(file_get_contents($translationFile), true);
        }
    }

    public function t($key)
    {
        // Return the translation for the given key, or the key itself if not found
        return isset($this->translations[$key]) ? $this->translations[$key] : $key;
    }
}
