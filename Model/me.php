<?php
  class Me{
    private $firstname;
    private $lastname;
    private $level;
    private $username;

    function __construct(){

    }
    public function getFirstname(){
      return $this->firstname;
    }
    public function getLastname(){
      return $this->lastname;
    }
    public function getLevel(){
      return $this->level;
    }
    public function getUsername(){
      return $this->username;
    }
    public function setFirstname($firstname){
      $this->firstname = $firstname;
    }
    public function setLastname($lastname){
      $this->lastname = $lastname;
    }
    public function setLevel($level){
      $this->level = $level;
    }
    public function setUsername($username){
      $this->username = $username;
    }
  }
