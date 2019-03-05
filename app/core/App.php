<?php

class App {

    protected $controller = "home";
    protected $method = "index";
    protected $params = [];

    public function __construct() {
        $url = $this->parseUrl();

        if (file_exists("../app/controllers/" . $url[0] . ".php")) {
            $this->controller = $url[0];
            UNSET($url[0]);
        }

        require_once "../app/controllers/" . $this->controller . ".php";

        $this->controller = new $this->controller;

        if (ISSET($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                UNSET($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];


        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl() {
        if (ISSET($_GET["url"])) {
            $trimedUrl = rtrim($_GET["url"], "/");
            $filteredUrl = filter_var($trimedUrl, FILTER_SANITIZE_URL);
            $url = explode("/", $filteredUrl);

            return $url;
        }
    }

}

?>