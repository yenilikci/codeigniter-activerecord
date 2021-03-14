<?php

class helperTest extends CI_Controller
{
    public function index()
    {
        echo topla(10,20) . "<br>";
        getFullDate(date("2021-05-29")); //Y-m-d
    }
}

?>