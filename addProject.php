<?php

require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\Project;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'cursophp',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();
// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

if(!Empty($_POST)){
    var_dump($_POST);
    $project = new Project();
    $project->title = $_POST['title'];
    $project->description = $_POST['description'];
    $project->visible = true;
    $project->save();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
      <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
    crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Project</title>
</head>
<body class="container">
    <h1>Add Project</h1>
    <form action="addProject.php" method="post">
    <div class="form-row">
    
        <div class="form-group col-md-6">
            <label for="">Title:</label>
            <input type="text" 
                    class="form-control" 
                    name="title" 
                    id="title">
        </div>
    
    
        <div class="form-group col-md-6">
            <label for="">Description</label>
            <input type="text" 
                    class="form-control" 
                    name="description" 
                    id="description">
        </div>
    
        <button type="submit" class="btn btn-primary btn-block">Add Project</button>
    </form>
</body>
</html>