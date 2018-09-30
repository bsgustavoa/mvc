<?php
namespace Controllers;

use \Core\Controller;

class HomeController extends Controller
{

    private $user;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [];

        $this->loadTemplate('home', $data);
    }

}
