<?php
/*
 * Session Class
 *
 * */
class  Session{

    /*
     * Initiazed / Starterd Session
     * */
    public  static function  initializedSession(){
        session_start();
    }

    /* Session set
    it can Set a Session
      *example :: $_SESSION['id'] = '5';
    */
    public  static function  setSession($key,$value){
      $_SESSION[$key] = $value;
    }
    /*
     * Get a Session
     * it/user can get session by $key
     *
     * */
    public static function getSession($key){
         if (isset($_SESSION[$key])){
             return $_SESSION[$key];
         }
         else{
          return false;
         }
    }

    /*
     *Session destroy;
     *
     * */
    public static function  destroySession(){
        session_destroy();
        session_unset();
        header("Location:adminlogin.php");
    }

    /*
     *
     * Cheak Session if Session is Start or Not
     * if Session is it can Login
     * otherwise it can not
     *
     * */
    public static function CheackSession(){
      self::initializedSession();
      if (self::getSession('login') != true){
          session::destroySession();
      }
    }

    /*
     *Session destroy for user;
     *
     * */
    public static function  destroySession_user(){
      session_destroy();
      session_unset();
      header("Location:index.php");
  }
  /*
     *
     * Cheak Session for user
 
     * */
    public static function CheackSession_user(){
      self::initializedSession();
      if (self::getSession('login') != true){
          session::destroySession_user();
      }
    }
}



?>