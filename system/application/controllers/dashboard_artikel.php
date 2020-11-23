<?php if(!defined('BASEPATH')) exit ('akses langsung tidak dibolehkan');
class dashboard_artikel extends Controller{
    var $admin_view = '';
    function __construct() {
        parent::Controller();
        $this->load->model('admin_model','amodel');
    }
    function index(){
        $data = array(
            'list_artikel'=>  $this->amodel->list_dashboard_artikel(),
        );
        $this->load->view('admin/home',$data);
    }
}
?>
