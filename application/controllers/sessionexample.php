<?php

class SessionExample extends CI_Controller
{
    public function index()
    {
        echo "session";
    }

    public function setSession($name = "")
    {
        //$this->session->set_userdata('login',$data);
        //$list = array("Gokhan","Melih","Mahmut");
        $list = $this->session->userdata("personelList");
        array_push($list,$name);
        $this->session->set_userdata("personelList",$list);
    }

    public function getSession()
    {
        print_r($this->session->userdata("personelList"));
        //print_r($this->session->all_userdata()); tüm bilgiler
    }


}