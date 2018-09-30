<?php
/**
 * Hm, mãe aqui.
 *
 * @author Webboo! Soluções Web
 *
 * @link https://www.webboo.com.br
 *
*/
namespace Core;

class Core
{

    public function run()
    {
        $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_MAGIC_QUOTES);
        $url = '/'.($url?$url:'');

        $url = $this->checkRoutes($url);

        $params = [];
        if (!empty($url) and $url != '/') {
            $url = explode('/', $url);
            array_shift($url);

            $url[0] = str_replace('-', '_', $url[0]);

            $currentController = $url[0].'Controller';
            array_shift($url);

            if (isset($url[0]) and $url[0] != '/') {
                $currentAction = $url[0];
                array_shift($url);
            } else {
                $currentAction = 'index';
            }

            if (count($url) > 0) {
                $params = $url;
            }

        } else {
            $currentController = 'HomeController';
            $currentAction = 'index';
        }

        $currentController = ucfirst($currentController);

        $prefix = '\Controllers\\';

        if (!file_exists('Controllers/'.$currentController.'.php') ||
            !method_exists($prefix.$currentController, $currentAction)) {
            $currentController = 'NotFoundController';
            $currentAction = 'index';
        }

        $newController = $prefix.$currentController;
        $c = new $newController();

        call_user_func_array([$c, $currentAction], $params);

    }

    public function checkRoutes($url)
    {

        global $routes;

        foreach ($routes as $pt => $newurl) {

            $pattern = preg_replace('(\{[a-z0-9]{1,}\})', '([a-z0-9-]{1,})', $pt);

            if (preg_match('#^('.$pattern.')*$#i', $url, $matches) === 1) {

                array_shift($matches);
                array_shift($matches);

                $items = [];
                if (preg_match_all('(\{[a-z0-9]{1,}\})', $pt, $m)) {
                    $items = preg_replace('(\{|\})', '', $m[0]);
                }


                $arg = [];
                foreach ($matches as $key => $match) {
                    $arg[$items[$key]] = $match;
                }

                foreach ($arg as $argkey => $argvalue) {
                    $newurl = str_replace(':'.$argkey, $argvalue, $newurl);
                }

                $url = $newurl;

                break;

            }

        }

        return $url;

    }

}
