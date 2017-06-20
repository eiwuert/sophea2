<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

// Include Security file
require_once ('Securities.php');

// Definds Unit
class PhotoManagers extends Securities {
    function index(){
        //$this->LoadView("err");
    }
    function upload(){
        $this->setFileSize(2048);
        $result = $this->fileUpload();
        $this->restData($result);
    }
}

?>
