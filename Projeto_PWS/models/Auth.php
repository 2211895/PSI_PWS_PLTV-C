<?php
class Auth {

    public function __construct(){
        session_start();
    }

    public function checkAuth($login,$loginPassword){
        $users = User::all();
        foreach ($users as $currentUser){

            if($currentUser->username == $login && $currentUser->password == $loginPassword) {
                $_SESSION['userId'] = $currentUser->id;
                $_SESSION['username'] = $currentUser->username;
                $_SESSION['role'] = $currentUser->role;
                return true;
            }
        }
        return false;
    }
}
?>