<?php

namespace app\core;

use app\config\Config;

/**
 * This class is responsible for obtaining the controller, method (action), and parameters from the URL
 * and checking their existence.
 */
class App
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $page404 = false;
    protected $params = [];

    // Constructor method
    public function __construct()
    {
        $URL_ARRAY = $this->parseUrl();
        $this->getControllerFromUrl($URL_ARRAY);
        $this->getMethodFromUrl($URL_ARRAY);
        $this->getParamsFromUrl($URL_ARRAY);

        // Calls a method from a class passing the parameters
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /**
     * This method retrieves information from the URL (after the site domain) and returns that data.
     *
     * @return array
     */
    private function parseUrl()
    {
        $REQUEST_URI = explode('/', substr(filter_input(INPUT_SERVER, 'REQUEST_URI'), 1));

        if (Config::SHIFT_PUBLIC_URL && !empty($REQUEST_URI) && $REQUEST_URI[0] === 'public') {
            array_shift($REQUEST_URI);
        }

        if(Config::SHIFT_URL && !empty($REQUEST_URI)) {
            array_shift($REQUEST_URI);
        }

        return $REQUEST_URI;
    }

    /**
     * This method checks if the provided array has data at position 0 (controller).
     * If it exists, it checks if there is a file with that name in the app/controllers directory
     * and instantiates an object contained in the file. Otherwise, the $page404 variable is set to true.
     *
     * @param  array  $url   Array containing information or not about the controller, method, and parameters.
     */
    private function getControllerFromUrl($url)
    {
        if (!empty($url[0])) {
            if (file_exists('../app/controllers/' . ucfirst($url[0])  . '.php')) {
                $this->controller = ucfirst($url[0]);
            } else {
                $this->page404 = true;
            }
        }

        require '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller();
    }

    /**
     * This method checks if the provided array has data at position 1 (method).
     * If it exists, it checks if the method exists in that specific controller
     * and assigns it to the $method variable of the class.
     *
     * @param  array  $url   Array containing information or not about the controller, method, and parameters.
     */
    private function getMethodFromUrl($url)
    {
        if (!empty($url[1])) {
            if (method_exists($this->controller, $url[1]) && !$this->page404) {
                $this->method = $url[1];
            } else {
                // If the class or method specified does not exist, the pageNotFound method
                // of the Controller is called.
                $this->method = 'pageNotFound';
            }
        }
    }

    /**
     * This method checks if the provided array has more than 2 elements
     * ($url[0] is the controller and $url[1] is the method/action to execute).
     * If so, a new array is assigned to the $params variable of the class starting from position 2 of $url.
     *
     * @param  array  $url   Array containing information or not about the controller, method, and parameters.
     */
    private function getParamsFromUrl($url)
    {
        if (count($url) > 2) {
            $this->params = array_slice($url, 2);
        }
    }
}
