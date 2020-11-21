<?php
class User extends model{

    public function verifyUserEmail($email){
        $sql = "SELECT id FROM `user` where `user`.email = '".$email."'" ;
        $sql = $this->db->prepare($sql);
        $sql->execute();
        if($sql->rowCount() == 0){
            return true; 
        }else{
            return false;
        }
    }
    public function verifyToken($token){
        $sql = "SELECT * FROM `user` WHERE `token` = '".$token."'";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        if($sql->rowCount() > 0){
            return true; 
        }else{
            return false;
        }
    }


    public function insertToken($id,$token){
        $sql = "UPDATE user SET `user`.token  ='".$token."' where `user`.id = '".$id."'" ;
        $sql = $this->db->prepare($sql);
        $sql->execute();
        if($sql->rowCount() > 0){
            return true; 
        }else{
            return false;
        }
    }
    
    public function getPermissionUser($id, $token){
        $sql = "SELECT type FROM user where id ='".$id."'and token ='".$token."'";
        $sql = $this->db->query($sql);
        if($sql->rowCount() > 0){
            $sql = $sql->fetch();
            return $sql['type'];
        }
        return 'User_not_found';
    }
    public function getDataUser($email,$password){
            $sql = "SELECT * FROM user where email ='".$email."' and password ='".$password."'";
            $sql = $this->db->query($sql);
            if($sql->rowCount() > 0){
                $sql = $sql->fetch();
                $dados = array(
                    'id' => $sql['id'],
                    'email' => $sql['email'],
                    'first_name' => $sql['first_name'],
                    'last_name' => $sql['last_name'],
                    'phone' => $sql['phone'],
                    'state' => $sql['state'],
                    'city' => $sql['city'],
                    'specialty' => $sql['specialty'],
                    'path' => $sql['path'],
                );
                return $dados;
            }else{
                return  '';
            }
    }
 
}
