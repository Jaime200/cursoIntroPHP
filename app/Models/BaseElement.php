<?php

namespace App\Models;
require_once('Printable.php');

class BaseElement implements Printable {

private $title;
public $description;
public $visible = true;
public $month;

public function __construct($title, $description){
  
    $this->setTitle($title);
    //$this->title = $title;
    $this->description = $description;
}


public function getTitle(){
    return $this->title;
}

public function setTitle($title){
    $this->title = ($title =='') ?  'N/A' : $title ;
}

public function getDurationAsString(){
    $years = floor($this->month/12);
    $ExtraMonths = $this->month % 12 ;
    return  ($years >= 1) 
    ? "$years years $ExtraMonths months"
    : "$ExtraMonths months";
  }
  public function getDescription(){
    return 'Descripcion '. $this->description;
    }

}