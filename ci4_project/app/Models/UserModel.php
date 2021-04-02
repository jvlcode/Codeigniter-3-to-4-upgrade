<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    private $request;
    public function __construct(){
        $this->request = \Config\Services::request();
    } 
    protected $table      = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = [ 'firstname','lastname','email','password'];
    
    public function set_user($id = 0)
    {
        $data = array(
            'firstname' => $this->request->getPost('firstname'),
            'lastname' => $this->request->getPost('lastname'),
            'email' => $this->request->getPost('email'),
            'password' => md5($this->request->getPost('password')),
            'updated_at' => date('Y-m-d H:i:s')
        );
            
        if ($id == 0) {

            return $this->insert($data);
        } 
    }
       
    
}
