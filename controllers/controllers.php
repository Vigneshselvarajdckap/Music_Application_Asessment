<?php
require ("models/model.php");

class Controller {
    private $Model;

    public function __construct() {


        $this->Model = new Model();
    }


    public function homePage()
    {
        $album=$this->Model->showMusic();
        require "views/home.view.php";
    }


    public  function  artistlist()
    {
        $artist=$this->Model->showArtist();
        require "views/home.view.php";
    }


    public  function  musicview()
    {
        $album=$this->Model->showMusic();
        require "views/home.view.php";
    }



    public function loginPage($data)
    {
        if ($data){
           $checkadmin= $this->Model->checkadmin($data);
           $check =$this->Model->registration($data);
           if ($checkadmin){
               $_SESSION['admin']=$checkadmin->username;
               $this->homePage();
           }
           elseif ($check){
               $_SESSION['user']=$check->username;
               $this->homePage();
           }
           else{
               $session['error']='user is not existed';
               require "views/registration/login.php";
           }
        }
        else{
            require "views/registration/login.php";
        }
    }

    public function logout()
    {
        session_destroy();
        header("location:/");

    }


    public function addMusic($data,$musicImage)
    {
        if ($data and $musicImage){
            $this->Model->addMusic($data,$musicImage);
            $this->homePage();
        }
        else{
            $artistname =$this->Model->showArtist();
            require "views/addmusic.view.php";
        }
    }


    public function addArtist($artist,$image)
    {
        if ($artist and $image){
            $this->Model->addArtist($artist,$image);
            $this->homePage();

        }
        else{
            require "views/addartist.view.php";
        }
    }

}