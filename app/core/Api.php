<?php 


class Api{
    protected $controller = 'home'; //iniaiLisasi controller url
    protected $method = 'index';  //inisialisasi method url
    protected $params = []; //inisialisasi parameter di url

    public function __construct()
    {
        $url = $this->parseURL();
        

        // controller
        // if (isset($url[0]) && file_exists('../app/controllers/' . $url[0] . '.php')) {
        //     $this->controller = $url[0];
        //     unset($url[0]);
        // } else if (isset($url[0]) && strpos($url[0], 'api') === 0 && file_exists('../app/controllers/api/' . substr($url[0], 4) . '.php')) {
        //     $this->controller = 'Api\\' . substr($url[0], 4);
        //     unset($url[0]);
        // } else {
        //     $this->controller;
        // }
        // controller
        if( isset($url[0]) && file_exists('../app/api/' . $url[0] . '.php') )  {
            $this->controller = $url[0];
            unset($url[0]);
        } else {
            $this->controller;
        }

        require_once '../app/api/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // method
        if( isset($url[1]) ) {
            if( method_exists($this->controller, $url[1]) ) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // params
        if( !empty($url) ) {
            $this->params = array_values($url);
            // var_dump($this->params);
            // $this->params = url[2];
        } else {
            $this->params;
        }

        // jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
}


    public function parseURL()
    {
        if (isset($_GET['url'])){
            // $url = $_GET['url'];
            // return $url;

            $url = rtrim($_GET['url'], '/'); //trim url
            $url = filter_var($url, FILTER_SANITIZE_URL); 
            $url = explode('/', $url);
            return $url;
        } else {
            $url = [];
        }
        return $url;        
    }

}


?>
