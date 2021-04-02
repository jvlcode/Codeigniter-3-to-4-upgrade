<?php
namespace App\Controllers;


class User extends BaseController {
 
    private $user_model;
    private $validation;
    

    public function __construct(){
        $this->user_model = new \App\Models\UserModel();
        $this->validation =  \Config\Services::validation();
        
    }
 
    public function index()
    {   
        $this->register();
    }

     public function register(){

         $data['title'] = 'Register';
        if($this->request->getMethod()=='post'){

            $this->validation->setRules([
                'firstname' => ['label' => 'Firstname', 'rules' => 'required'],
                'lastname' => ['label' => 'Last Name', 'rules' => 'required'],
                'email' => ['label' => 'Email', 'rules' => 'required|valid_email|is_unique[user.email]'],
                'password' => ['label' => 'Password', 'rules' => 'required'],
                'cpassword' => ['label' => 'Confirm Password', 'rules' => 'required|matches[password]'],
            ]);

      
            if ($this->validation->withRequest($this->request)->run() === FALSE)
            {   $page_data['validation'] = $this->validation;
                echo view('templates/header', $data);
                echo view('user/register',$page_data);
                echo view('templates/footer');
     
            }
            else
            { 
                if ($this->user_model->set_user())
                {                             
                    session()->setFlashData('msg_success','Registration Successful!');
                   return redirect()->to('register');            
                }
                else
                {                
                    session()->setFlashData('msg_error','Error! Please try again later.');
                    return redirect()->to('register');
                }
            }
        }else{
             $page_data['validation'] = $this->validation;
            echo view('templates/header', $data);
            echo view('user/register',$page_data);
            echo view('templates/footer');
        }
    }
    
     
}
