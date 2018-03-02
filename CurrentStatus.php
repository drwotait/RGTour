<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CurrentStatus
 *
 * @author madw
 */

include_once('./Connection.php');

class CurrentStatus {

    //put your code here
    private $currentPage = 1;
    private $currentCategory = 1;
    private $curretnGimnasticId = 0;

    public function setCurrentPage($newPage) {
        $this->currentPage = $newPage;
    }

    public function setCurrentCategory($newCategory) {
        $this->currentCategory = $newCategory;
    }

    public function setCurrentGymId($gymId) {
        $this->curretnGimnasticId = $gymId;
    }

    public function getCurrentPage() {
        return $this->currentPage;
    }

    public function getCurrentcategory() {
        return $this->currentCategory;
    }

    public function getCurrentGymId() {
        return $this->curretnGimnasticId;
    }

    public function ReadFCurrentStatus() {
        $link = dbConnection::getInstance()->getdbconnection();
        $wynik = $link->query('select * from currentpage');
        $r = $wynik->fetch_object();
        $this->setCurrentPage($r->page);
        $this->setCurrentCategory($r->categoryid);
        $this->setCurrentGymId($r->gymid);
        $wynik->close();
    }
    
    public function updateCurrentStatus() {
        $link = dbConnection::getInstance()->getdbconnection();
        if (! $stmt = $link->prepare("UPDATE currentpage SET page = ?, categoryid = ?,  gymid = ? ")){
            echo 'Error: ' . $link->error;
        }
        $stmt->bind_param('iii', $this->currentPage,  $this->currentCategory, $this->curretnGimnasticId);
        $stmt->execute();
        $stmt->close();        
    }

}
