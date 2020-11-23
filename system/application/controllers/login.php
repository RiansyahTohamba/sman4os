<?php if(!defined('BASEPATH')) exit('Akses langsung tdk dibolehkan');
class login extends Controller{
    public function __construct() {
        parent::Controller();        
    }
    public function index(){
        $this->load->view('login');
    }
}
?>
