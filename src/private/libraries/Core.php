<?php
namespace App\Libraries;

class Core
{
    public $currentController = 'Pages';
    public $currentMethod = 'index';
    public $params = [];

    public function __construct()
    {
        $url = $this->getUrl();
        if (isset($url[0]) && file_exists(APPPATH.'/../private/controllers/'.ucwords($url[0]).'.php')) {
            $this->currentController = ucwords($url[0]);
        }

        require_once(APPPATH.'/../private/controllers/'.$this->currentController.'.php');
        
        $controllerclass = '\\App\\Controllers\\'.$this->currentController;
        
        $this->currentController = new $controllerclass;
        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
            }
        }

        $this->params = $url?array_values($url):[];

        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = ltrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;
        }
    }
}
