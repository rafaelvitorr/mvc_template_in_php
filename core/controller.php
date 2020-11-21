<?php
class controller{
    public function loadView($viewName, $viewData = array()){
        extract($viewData);
        require 'views/'.$viewName.'.php';
    }
    public function loadTemplate($viewName,$header = true, $viewData = array()){
        require 'views/templete.php';
    }

    public function loadViewInTemplate($viewName,$header= true, $viewData = array()){
        extract($viewData);
        if($header){
            require 'views/header.php';
        }
        require 'views/'.$viewName.'.php';
        if($header){
            require 'views/footer.php';
        }
    }
}