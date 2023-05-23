<?php
require_once __DIR__."/../dao/SignDao.php";

class SignService {
    protected $dao;

    public function __construct(){
        $this->dao = new SignDao();
    }
    
    public function login($username,$password){
        return $this->dao->login($username,$password);
      }

    public function register($name,$username,$password){
        return $this->dao->register($name,$username,$password);
      }


}
?>
