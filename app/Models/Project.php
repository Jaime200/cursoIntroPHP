<?php
namespace App\Models;
//require_once 'BaseElement.php';
use Illuminate\Database\Eloquent\Model;

class Project extends Model {

    protected $table = 'projects';
    public function getDurationAsString(){
        $years = floor($this->month/12);
        $ExtraMonths = $this->month % 12 ;
        return "Job duration: " .  ($years >= 1) 
        ? "$years years $ExtraMonths months"
        : "$ExtraMonths months";
    }

}