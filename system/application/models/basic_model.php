<?php if(!defined('BASEPATH')) exit('akses langsung tdk diperkenankan');
/* -------------------------------------------------
 |                  MODEL
 | -------------------------------------------------
 | 
 | berfungsi memanipulasi data dari database, fungsi-fungsi dalam model
 | 1. Membuat kueri - make_query()- yang dipake pada smua fungsi di kelas ini
 | 2. Mengambil daftar artikel - get_artikel_list()-
 | 3. Melihat detil artkel - detail_artikel()-
 | 
 | PERHATIANN !!!!! LIHAT parameter field pada fungsi make_query() !!
 |  
 | ------------------------------------------------------*/
class basic_model extends Model{
    var $output_table = '';
    public function __construct() {
        parent::Model();
        $this->load->database();
        $this->load->library('table');//pemanggil library tabel utk buat tabel
        $this->load->helper('text','url');//pemanggil helper utk fungsi word_limiter()        
    }
    private function make_query($fields='',$table='',$where=array(),
        $limit=NULL,$offset='',$order=array('field'=>NULL,'sort'=>'ASC')){
        $this->db->select($fields);        
        if(!is_null($order['field'])){
            $this->db->order_by($order['field'],$order['sort']);
        }
        return $this->db->get_where($table,$where,$limit,$offset);
    }
    public function get_artikel_list($limit=NULL,$offset='',
            $order=array('field'=>'Waktu_artikel','sort'=>'DESC')){                
        $query = $this->make_query('Id_artikel,Judul_artikel,Isi_artikel,Waktu_artikel,Id_artikel_teks,Kategori_artikel'
                ,'Artikel',array(),$limit,$offset,$order);
        if($query->num_rows()>0){
            foreach ($query->result() as $value){                                                                                
                $this->table->add_row('<h4>'.strtoupper($value->Judul_artikel)//fungsi strtoupper mengubah menjadi huruf besar
                        .'</h4><small>'.anchor('blog/detail/'.$value->Id_artikel_teks,'read more').'</small>');                
                $this->table->add_row(word_limiter($value->Isi_artikel,50));//fungsi word_limiter() utk membatasi kata (50)                                
                $this->output_table .= $this->table->generate();                
                $this->output_table .= '<br/>';                                
                $this->table->clear();                
            }
            return $this->output_table;
        }else{
            return FALSE;
        }
    }
    public function hitung_baris_tabel($tabel=''){
        return $this->db->count_all($tabel);
    }
    public function get_artikel_detail($Id_artikel_teks=''){
        if($Id_artikel_teks==''){            
            return "Id Kosong";
        }
        $query =  $this->make_query('Judul_artikel,Isi_artikel,Waktu_artikel,Kategori_artikel',
                'Artikel',array('Id_artikel_teks'=>$Id_artikel_teks));                
        if($query->num_rows() == 1){
            $value = $query->row();
            $this->output_table .= '<h2>'.strtoupper($value->Judul_artikel).'</h2>';
            $this->table->add_row('Waktu rilis : '.$value->Waktu_artikel);            
            $this->table->add_row('Kategori : '.$value->Kategori_artikel);            
            $this->output_table .= $this->table->generate();
            $this->output_table .= '</br>';
            $this->output_table .= ascii_to_entities($value->Isi_artikel);            
            $this->table->clear();
            $this->related_artikel($Id_artikel_teks, $value->Kategori_artikel);
            return $this->output_table;
        }else{            
            return 'data gagal diambil dari database';
        }
    }
    public function related_artikel($Id_teks='',$Kategori=''){        
        $query = $this->make_query('Judul_artikel,Id_artikel_teks','Artikel',array('Id_artikel_teks !='=>$Id_teks,
            'Kategori_artikel'=>$Kategori));
        if($query->num_rows() > 0){
            $this->output_table .= '<hr><h3>Related Artikel :  '.$Kategori.'</h3>';
            foreach ($query->result() as $value){                
                $this->table->add_row(anchor('blog/detail/'.$value->Id_artikel_teks,$value->Judul_artikel));
                $this->output_table .= $this->table->generate();
                $this->output_table .= '</br>';
                $this->table->clear();
            }
            return $this->output_table;
        }else{
            return FALSE;
        }
    }
    public function get_popular_post($limit=NULL,$offset='',
            $order=array('field'=>'Waktu_artikel','sort'=>'DESC')){
        $query = $this->make_query('Id_artikel,Judul_artikel,Isi_artikel,Waktu_artikel,Id_artikel_teks,Kategori_artikel'
                ,'Artikel',array(),$limit,$offset,$order);
        if($query->num_rows()>0){
            foreach ($query->result() as $value){
                $this->table->add_row(anchor('blog/detail/'.$value->Id_artikel_teks,$value->Judul_artikel));                                                                                                
                $this->output_table .= $this->table->generate();
                $this->output_table .= '</br>';
                $this->table->clear();                
            }
            return $this->output_table;
        }else{
            return FALSE;
        }        
    }
    public function get_arsip_post($limit=NULL,$offset='',
            $order=array('field'=>'Waktu_artikel','sort'=>'DESC')){
        $query = $this->make_query('Id_artikel,Judul_artikel,Isi_artikel,Waktu_artikel,Id_artikel_teks,Kategori_artikel'
                ,'Artikel',array(),$limit,$offset ,$order);
        if($query->num_rows()>0){
            $this->output_table ="";
            foreach ($query->result() as $value){                
                $this->table->add_row(anchor('blog/detail/'.$value->Id_artikel_teks,$value->Judul_artikel));                                                                                                
                $this->output_table .= $this->table->generate();
                $this->output_table .= '</br>';
                $this->table->clear();                
            }
            return $this->output_table;
        }else{
            return FALSE;
        }        
    }
    public function simpan_komentar($str_id=''){
        $num_id = '';
        $query = $this->make_query('Id_artikel', 'Artikel', array('Id_artikel_teks'=>$str_id));
        if($query->num_rows() == 1){
            $row = $query->row();
            $num_id = $row->Id_artikel;                        
            $this->db->query("UPDATE Artikel SET Commcount_artikel = Commcount_artikel+1  WHERE Id_artikel = $num_id");
        }  else {
            return FALSE;
        }
        $post['Id_artikel'] = $num_id;        
        $post['Nama_komentar'] = $this->input->post('visitorname');
        $post['Email_komentar'] = $this->input->post('email');
        $post['Isi_komentar'] = $this->input->post('comment');
        $post['Waktu_komentar'] = date('Y-m-d H:i:s');
        $post['Approve_komentar'] = 1;                                          
        $this->db->trans_start();//pake trans_start() krn engine table InnoDB
        //insert ke tabel
        $this->db->insert('Komentar',$post);        
        $this->db->trans_complete();
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
        }  else {
            $this->db->trans_commit();            
        }
        redirect('blog/detail/'.$str_id,'location');
    }
    public function tampilkan_komentar($str_id=""){
        $this->load->helper('smiley');
        $this->output_table = "";
        $num_id = "";
        //$num_id = $this->basic_model->get_movie_idnum($str_id);
        $query = $this->make_query('Id_artikel,Commcount_artikel','Artikel',
                array('Id_artikel_teks'=>$str_id));
        if($query->num_rows() == 1){
            $row = $query->row();
            $num_id = $row->Id_artikel;            
        }else{
            return FALSE;
        }
        $query2 = $this->make_query('Nama_komentar,Isi_komentar,Waktu_komentar','Komentar',
                array('Id_artikel'=>$num_id,'Approve_komentar'=>1));        
        //hanya menampilkan komentar jika mmg ada        
        if($query2->num_rows() > 0){                        
            $this->output_table = heading('Komentar ('.$row->Commcount_artikel.')',2);
            foreach ($query2->result() as $value){
                $create_date = "<small>".strftime('%d/%b/%Y %H:%M:%S',  
                        strtotime($value->Waktu_komentar))."</small>";
                $this->output_table .= '<div class = "komentar">';
                $this->table->add_row('<h3>'.$value->Nama_komentar.'</h3>'.$create_date);
                $this->table->add_row(parse_smileys($value->Isi_komentar,  base_url().'aset/smileys/'));
                $this->output_table .= $this->table->generate();
                $this->output_table .= '</div>';
                $this->table->clear();
           }
           return $this->output_table;
        }else{
            return FALSE;
        }
    }
}

?>