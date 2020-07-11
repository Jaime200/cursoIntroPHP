<?php
namespace App\Models;
//require_once('BaseElement.php');

use Illuminate\Database\Eloquent\Model;


class Job extends Model {

    protected $table = 'jobs';
    // public function __construct($title, $description){
    //     $newTitle = 'Job ' . $title;
    //     parent:: __construct($newTitle, $description);
    //  }

    // public function getDurationAsString(){
    //     $duration = parent::getDurationAsString();
    //     return "Job duration: $duration" ;
    // }

    public function getDurationAsString(){
        $years = floor($this->month/12);
        $ExtraMonths = $this->month % 12 ;
        return "Job duration: " .  ($years >= 1) 
        ? "$years years $ExtraMonths months"
        : "$ExtraMonths months";
      }

   
}