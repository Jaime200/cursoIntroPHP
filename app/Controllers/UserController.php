<?php

namespace App\Controllers;
use App\Models\User;
use Respect\Validation\Validator as v;

class UserController extends BaseController{

    public function getAddJobAction($request){
        $responseMessage = null;
        return  $this->renderHTML('addUser.twig', [
            'responseMessage' => $responseMessage
        ]);
    }

    public function postNewtUser($request){
        $responseMessage = null;
        var_dump($request->getMethod());
        if($request->getMethod()=='POST'){
            $postData = $request->getParsedBody();

            $userValidator = v::key('email',    v::email())
                              ->key('password', v::stringType()->notEmpty());
            try {
            $userValidator->assert($postData); 
            $user = new User();
            $user->email =  $postData['email'];
            $user->password = password_hash($postData['password'],PASSWORD_DEFAULT);
            $user->save();
            $responseMessage = 'Saved';
            }
            catch (\Exception $ex ) {
                $responseMessage = $ex->getMessage();
            }

        }

        return  $this->renderHTML('addUser.twig', [
            'responseMessage' => $responseMessage
        ]);

    }

}