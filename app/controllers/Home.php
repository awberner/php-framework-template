<?php

use app\config\Config;
use app\core\Controller;

class Home extends Controller
{
    /*
    * Calls the view index.php from /home or just /
    */
    public function index()
    {

        $data = array(
            'site_url' => Config::SITE_URL,
        );

        $this->view('home/index', [
            "data" => $data
        ]);
    }

}
