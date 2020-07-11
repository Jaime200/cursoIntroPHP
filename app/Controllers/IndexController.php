<?php

namespace App\Controllers;
use App\Models\{Job, Project};

class IndexController extends BaseController{

    public function indexAction(){
        
        $jobs = Job::all();
        $lastName = 'Muñoz';
        $name ="Jaime $lastName";
        $limitMonth = 2000;
        
        return $this->renderHTML('index.twig',[
            'name' => $name,
            'jobs' => $jobs 
        ]);
        //include '../views/index.php';
    }

}