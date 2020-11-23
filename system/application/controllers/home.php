<?php if( ! defined('BASEPATH')) exit('Akses langsung tidak diperkenankan');
/**
* Home
* Halaman beranda
* berisi 3 data film dan 3 data lirik lagu
*/
class Home extends Controller
{
    var $_public_view;
    
    //konstruksi kelas
    public function __construct(){
        parent::Controller(); //inherit dari parent                
        $this->_public_view = $this->config->item('public_view');
    }
    public function index(){
        $data = array('page_title' => 'beranda - SMAN OS'
                    ,'page_content' => 'home'
                    );
        $this->load->view($this->_public_view,$data);
    }
}
?>