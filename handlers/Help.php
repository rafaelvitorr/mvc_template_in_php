<?php

class Help extends model{
  
    public static function createToken(){
      $token = md5(time().rand(0, 9999));
      return $token;
    }

    public static function isLoggedIn($isLogin = false){
        if (isset($_SESSION['token']) && !empty($_SESSION['token'])) {
          $User = new User;
          if($User->verifyToken($_SESSION['token'])){
            return true;
          }
        }
          return false;
    }

    public static function checkTypeUser(){
      if (Help::isLoggedIn()){
        $User = new User;
        return $User->getPermissionUser($_SESSION['id'],$_SESSION['token']);
      }
    }

    public static function whichCurrentURL( $urlRequest=false){
      $dataReturn = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

      if($urlRequest){
        $dataReturn = "$_SERVER[REQUEST_URI]";
      }
      return $dataReturn;
    }

   

}