<?php
class homeController extends controller{

    public function __construct()
    {
        if (!Help::isLoggedIn()) {
            header('Location:'.BASE_URL.'login');
        }
    }

    public function index(){
        $this->loadTemplate('home');
    }

}