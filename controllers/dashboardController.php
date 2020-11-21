<?php
class dashboardController extends controller{
    
    public function __construct()
    {
        if (!Help::isLoggedIn()) {
            header('Location:'.BASE_URL.'home');
        }
    }
    
    public function index(){
        if(Help::checkTypeUser() === 'administrator'){
            $this->dashboardAdmin();
            exit();
        }
       $this->loadTemplate('dashboardStudent');

    }
    
    public function dashboardStudent(){
       $this->loadTemplate('dashboardStudent',true,array('exemple'=>'student'));
    }
    public function dashboardAdmin(){
       $this->loadTemplate('dashboardAdmin',true,array('exemple'=>'admin'));
    }

}