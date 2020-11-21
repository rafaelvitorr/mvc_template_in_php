<?php
class loginController extends controller
{
    public function __construct()
    {   if(!strpos(Help::whichCurrentURL(true),'logoutUser')){
            if(Help::isLoggedIn() && (Help::checkTypeUser() == 'administrator')){
                header('Location:'.BASE_URL.'dashboard');
            }else if (Help::isLoggedIn() ) {
                header('Location:'.BASE_URL.'home');
            }
        }
    }
    public function index()
    {
        $this->loadTemplate('login', false);
    }

    public function access()
    {
        $User = new User();
        if (
            isset($_POST['loginEmail']) && !empty($_POST['loginEmail'])
            && isset($_POST['loginSenha']) && !empty($_POST['loginSenha'])
        ) {

            $email = addslashes($_POST['loginEmail']);
            $password = md5(addslashes($_POST['loginSenha']));
            if ($User->verifyUserEmail($email)) {
                echo json_encode(array(
                    "menssagen" => 'O email inserido não corresponde a nenhuma conta.',
                    "status" => 'User_not_found',
                ));
                exit();
            }
            $returnUser = $User->getDataUser($email, $password);
            
            if ($returnUser != "") {
                $token = Help::createToken();
                if($User->insertToken($returnUser['id'],$token)){
                    $_SESSION['token'] = $token;
                    $_SESSION['id'] = (int)$returnUser['id'];
                    $_SESSION['email'] = $returnUser['email'];
                    $_SESSION['specialty'] = $returnUser['specialty'];
                    $_SESSION['first_name'] = $returnUser['specialty'];
                    $_SESSION['path'] = $returnUser['path'];
                    echo json_encode(array(
                        "menssagen" => 'Login Realizado com Sucesso!',
                        "status" => 'Sucess',
                    ));
                    exit();
                }
                echo json_encode(array(
                    "menssagen" => 'Ocorreu um erro no sistema.',
                    "status" => 'Ops!',
                ));
            }
            echo json_encode(array(
                "menssagen" => 'Ops!! Senha Incorreta.',
                "status" => 'Password_incorrect',
            ));
            exit();
        }
    }
    public function logoutUser()
    {
        $User = new User();
        if (Help::isLoggedIn()) {
            $User->insertToken((int)$_SESSION['idUser'],'-1');
            session_destroy();
            header('Location:'.BASE_URL);
            exit();
        }
    }
}
