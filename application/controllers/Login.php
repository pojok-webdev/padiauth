<?php
class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('user');
    }
    function index(){
        $auth = new Auth();
        if($auth->is_logged_in()){
        }else{
            redirect("login/login");
        }
        $user = new User();
        $data = array(
            'users'=>$user->getusers(),
            'username'=>$this->session->userdata('username')
        );
        $this->load->view('users',$data);
    }
    function login(){
        $this->load->view('login');
    }
    function logout(){
        $auth = new Auth();
        $auth->log_out('welcome');
    }
    function loginhandler(){
        $auth = new Auth();
        $params = $this->input->post();
        if($auth->log_in_by_email(trim($params['email']),trim($params['password']))){
            redirect("/login/showusers");
        }else{
            echo "Login tidak berhasil, silakan <a href='/login/login'>relogin</a>";
        }
    }
    function register(){
        $this->load->view('register');
    }
    function registerhandler(){
        $params = $this->input->post();
        $auth = new Auth();
        $reg = $auth->create_user($params["username"],$params["password"],$params["email"]);
        if($reg!=false){
            echo "Sukses create user";
        }else{
            echo "Error create user";
        };
        redirect("/login/showusers");
    }
    function changepassword(){
        $email = $this->uri->segment(3);
        $data = array(
            'email'=>$email,
            'password'=>'puji'
        );
        $this->load->view('changepassword',$data);
    }
    function changepasswordhandler(){
        $auth = new Auth();
        $params = $this->input->post();
        $auth->change_password_user_by_email($params['password'],$params['email']);
        redirect("/login");
    }
    function showusers(){
        $user = new User();
        $data = array(
            'users'=>$user->getusers(),
            'username'=>$this->session->userdata('username')
        );
        $this->load->view('users',$data);
    }
}