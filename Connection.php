<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* * ****************************************************
 * connection.php
 * konfiguracja połączenia z bazą danych
 * **************************************************** */

class dbConnection {

    private static $link = null;
    private static $instance;

    private function __construct() {
        //$mysql_server = "drwotaitdkrgtour.mysql.db";
        $mysql_server = "127.0.0.1";
        // admin
        //$mysql_admin = "drwotaitdkrgtour";
        $mysql_admin = "root";
        // hasło
        //$mysql_pass = "RGTour1972";
        $mysql_pass = "";
        // nazwa baza
        $mysql_db = "drwotaitdkrgtour";
        // nawiązujemy połączenie z serwerem MySQL

        self::$link = mysqli_connect($mysql_server, $mysql_admin, $mysql_pass, $mysql_db);
    }

    //private function __destruct() {
        //if (self::$link != NULL){
        //    self::$link->close();
       // }
        
    //}

    private function __clone() {
        
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new dbConnection();
        }
        return self::$instance;
    }
    
    public function getdbConnection(){
        return self::$link;
    }

}


 

