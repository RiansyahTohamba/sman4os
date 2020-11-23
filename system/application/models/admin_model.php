<?php if(!defined('BASEPATH')) exit('akses langsung tidak diperkenankan');
class admin_model extends Model{
    function __construct() {
        parent::Model();
    }
    function list_dashboard_artikel(){
        $query = $this->db->query('SELECT Judul_artikel FROM Artikel'); 
        foreach ($query->result() as $value){
            $this->table->add_row('<span style="color : blue;font : italic .9em arial">'.$value->Judul_artikel.'</span>');
            $this->table->add_row('<small> view | edit | delete </small>');
            $this->output_table .= $this->table->generate();
            $this->output_table .= '<br/>';
            $this->table->clear();
        }
        return $this->output_table;
    }    
}
?>
