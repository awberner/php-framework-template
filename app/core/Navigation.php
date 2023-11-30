<?php

namespace app\core;

use app\config\Config;

class Navigation
{

    public function __construct()
    {
        $this->siteurl = Config::SITE_URL;
    }

    public function link($link)
    {
        // Return the translation for the given key, or the key itself if not found
        return $this->siteurl . $link;
    }

    public static function redirect($link)
    {
        header("Location: ". Config::SITE_URL . $link);
        exit();
    }
}
