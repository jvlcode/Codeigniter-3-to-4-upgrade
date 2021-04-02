 <?php
class User extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation'));
    }
 
    public function index()
    {
        $this->register();
    }
    
    public function register()
    {
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
        
        $data['title'] = 'Register';
       
        if ($this->form_validation->run() === FALSE)
        {           
            $this->load->view('templates/header', $data);
            $this->load->view('user/register');
            $this->load->view('templates/footer');
 
        }
        else{ 
            if ($this->user_model->set_user())
            {                             
                $this->session->set_flashdata('msg_success','Registration Successful!');
                redirect('user/register');            
            }
            else
            {                
                $this->session->set_flashdata('msg_error','Error! Please try again later.');
                redirect('user/register');
            }
        }
    }
    
   
}
