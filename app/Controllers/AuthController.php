<?php

namespace App\Controllers;
use App\Models\User;
use Respect\Validation\Validator as v;
use Zend\Diactoros\Response\RedirectResponse;
use Exception;

class AuthController extends BaseController{

    public function getLogin($request){
        $responseMessage = null;
        return  $this->renderHTML('login.twig', [
            'responseMessage' => $responseMessage
        ]);
    }

    public function postLogin($request){
        $responseMessage = null;
        if($request->getMethod()=='POST'){
            $postData = $request->getParsedBody();

            $userValidator = v::key('email',    v::email())
                              ->key('password', v::stringType()->notEmpty());
            try {
            $userValidator->assert($postData); 
            $user = User::where('email', $postData['email'])->first();
            if(!$user){
                throw new \Exception('Email/contraseña incorrectos');
            }

            
            if(!password_verify( $postData['password'], $user->password)){
                throw new \Exception('Email/contraseña incorrectos');
            }
            
            $_SESSION['userId'] = $user->email;
            return  new RedirectResponse('admin');
    
            }
            catch (Exception $ex ) {
                $responseMessage = $ex->getMessage();
                return  $this->renderHTML('login.twig', [
                    'responseMessage' => $responseMessage
                ]);
        
            }

        }

        
    }


    public function getLogout(){
        unset($_SESSION['userId']);
        return  new RedirectResponse('login');

    }

}