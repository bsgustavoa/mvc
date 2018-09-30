<?php
/**
 * Orgãos dos controllers.
 *
 * @author Webboo! Soluções Web
 *
 * @link https://www.webboo.com.br
 *
*/
namespace Core;

class Controller
{

    protected $db;

    public function __construct()
    {
        global $config;
    }

    public function loadView($viewName, $viewData = [])
    {
        extract($viewData);
        include 'Views/'.$viewName.'.php';
    }

    public function loadTemplate($viewName, $viewData = [])
    {
        include 'Views/templates/pattern.php';
    }

    public function loadViewInTemplate($viewName, $viewData)
    {
        extract($viewData);
        include 'Views/'.$viewName.'.php';
    }

}
