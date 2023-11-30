<?php

use app\core\Controller;

class User extends Controller
{
    /**
     * Calls the index.php view as follows: /user/index or simply /user
     * and returns all users in the database to the view.
     */
    public function index()
    {
        //$Users = $this->model('Users'); // Returns the Users() model
        //$data = $Users::findAll();
        $data = [];

        $this->checkLogin();
        $this->view('user/index', ['users' => $data]);
    }

    /**
     * Logout the user and redirect to the home page.
     */
    public function logout()
    {
        $this->checkLogin();
        $this->logout();
    }

    /**
     * Calls the show.php view as follows: /user/show passing a parameter
     * via URL /user/show/id and returns an array containing (or not) a specific
     * user. It also checks whether an id is passed via the URL; if not,
     * the not found page view is called.
     * @param  int   $id   User identifier.
     */
    public function show($id = null)
    {
        if (is_numeric($id)) {
            $Users = $this->model('Users');
            $data = $Users::findById($id);

            $this->checkLogin();
            $this->view('user/show', ['user' => $data]);
        } else {
            $this->pageNotFound();
        }
    }
}
