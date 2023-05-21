<?php
require_once __DIR__."/../dao/SignDao.php";

class SignService {
    protected $dao;

    public function __construct(){
        $this->dao = new SignDao();
    }

    /** TODO
    * Implement service method to return detailed accounts
    */
    
    public function login(){

        return $this->dao->login();

    }


    public function register(){
        return $this->dao->register();
      }


}
?>
