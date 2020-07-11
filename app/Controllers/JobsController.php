<?php

namespace App\Controllers;
use App\Models\Job;
use Respect\Validation\Validator as v;
class JobsController extends BaseController{

    public function getAddJobAction($request){
        $responseMessage = null;
        if($request->getMethod()=='POST'){
            $postData = $request->getParsedBody();            
            $jobValidator = v::key('title',          v::stringType()->notEmpty())
                              ->key('description', v::stringType()->notEmpty());
            try {
                $jobValidator->assert($postData);    
                
                $files = $request->getUploadedFiles();
                $logo = $files['logo'];

                if($logo->getError() == UPLOAD_ERR_OK){
                    $fileName = $logo->getClientFilename();
                    $postTitle = $postData['title'];
                    $pathImg = "upload/$postTitle"."_"."$fileName";
                    $logo->moveTo($pathImg);
                }
                $job = new Job();
                $job->title =  $postData['title'];
                $job->img =  $pathImg;
                $job->description =  $postData['description'];
                $job->save();
                $responseMessage = 'Saved';
            } catch (\Exception $ex ) {
                $responseMessage = $ex->getMessage();
            }
            

        }

        return  $this->renderHTML('addJob.twig', [
            'responseMessage' => $responseMessage
        ]);
        //include '../views/addJob.php';
        
        
    }
}