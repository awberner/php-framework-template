<?php

namespace app\core;

use app\config\Config;

/**
 * This class is responsible for instantiating a model and calling the correct view,
 * passing the data that will be used.
 */
class Controller
{
    /**
     * Constructor method to start the session.
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * This method is responsible for calling a specific view (page).
     *
     * @param  string  $model   It is the model that will be instantiated to be used in a view, either its methods or attributes.
     * @return object  An instance of the specified model.
     */
    public function model($model)
    {
        require '../app/models/' . $model . '.php';
        $class = 'app\\models\\' . $model;
        return new $class();
    }

    /**
     * This method is responsible for calling a specific view (page).
     *
     * @param string $view The view that will be called (or required).
     * @param array $data The data that will be displayed in the view.
     */
    public function view($view, $data = [])
    {

        $translation = new Translation();
        $navigation = new Navigation();

        require '../app/views/' . $view . '.php';
    }

    /**
     * Check if the user is logged in. If not, redirect to the login page.
     */
    public function checkLogin()
    {
        if (!isset($_SESSION['user_id'])) {
            // Redirect to the login page
            header('Location: ' . Config::SITE_URL . '/Login');
            exit();
        }
    }

    /**
     * Logout the user by destroying the session and redirecting to the home page.
     */
    public function logout()
    {
        // Destroy the session
        session_unset();
        session_destroy();

        // Redirect to the home page
        header('Location: ' . Config::SITE_URL);
        exit();
    }

    /**
     * This method is inherited by all child classes that call it when
     * the method or class specified by the user is not found.
     */
    public function pageNotFound()
    {
        $data = array(
            'site_url' => Config::SITE_URL,
        );
        $this->view('errors/404', ["data" => $data]);
    }
}
