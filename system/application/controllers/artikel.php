<?php if(!defined('BASEPATH')) exit ('Akses langsung tidak diperkenankan');
/**
 * @author Riansyah
 */
class artikel extends Controller{
    var $_public_view;
    public function __construct() {
        parent::Controller();
        /* SDH DISET di autoload.php
        $this->load->model('basic_model','bmodel');//rumus fungsi= model(nama_model, var_objek)
        $this->load->helper('url');
        $this->config->load('SMAN4OS');*/
        $this->_public_view = $this->config->item('public_view');
    }    
    public function index(){
        $limit = 4;
        $offset = $this->uri->segment(3,0);
        /*============== cara paginasi ========== */
        $this->load->library('pagination');
        $config['uri_segment'] = 3;        
        $config['base_url'] = site_url('blog/list');//mengubah nama URL shingga menjadi http://localhost/blog/list
        $config['total_rows'] = $this->basic_model->hitung_baris_tabel('Artikel');//memanggil fungsi hitung_baris() di DtBase , tabel Artikel
        $config['per_page'] = $limit;//batas artikel yg ditampilkan per halaman
        $this->pagination->initialize($config);
        $data = array(
            'query'=>  $this->basic_model->get_artikel_list($limit,$offset),
            'arsip_post'=>  $this->basic_model->get_arsip_post(5,0),
            'page_title'=>'SMAN4 OS - blog',
            'page_content'=>'daftar_artikel',
            'pagination'=>$this->pagination->create_links());
        $this->load->view($this->_public_view,$data);        
    }

    public function detail(){
        $Id_artikel_teks = '';
        if($this->uri->segment(3) == FALSE){            
            redirect('blog/list','location');
        }else{
            $Id_artikel_teks = $this->uri->segment(3);
        }
        $data = array('query'=> $this->basic_model->get_artikel_detail($Id_artikel_teks),
                'arsip_post'=>  $this->basic_model->get_arsip_post(5,0),
                'id'=>  $Id_artikel_teks,
                'komentar'=> $this->basic_model->tampilkan_komentar($Id_artikel_teks),
                'emot_tabel'=> $this->smileys_table(),
                'page_title'=>  'SMAN 4 OS - '.$this->uri->segment(3),
                'page_content'=>  'detail_artikel');            
        if($this->__komentar() == FALSE){
            //kondisi pengisian form gagal, kembali ke form
            $this->load->plugin('captcha');
            $this->load->helper('array');
            $text = ucfirst(random_element($this->config->item('captcha_word')));
            $number = random_element($this->config->item('captcha_num'));
            $word = $text.$number;
            $expired = time()-380;
            $this->db->query('DELETE FROM Captcha WHERE Time_captcha < '.$expired);            
            $vals = array(
                'font_path' => 'system/fonts/LACURG__.TTF',
                'img_path' => './aset/captcha/',
                'img_url' => base_url().'aset/captcha/',
                'word' => $word,
                'expiration' => $expired,
            );
            $cap = create_captcha($vals);
            $data['captcha_img'] = $cap['image'];
            $captcha = array(
                'Id_captcha' => '',
                'Time_captcha' => $cap['time'],
                'Ip_captcha' => $this->input->ip_address(),
                'Word_captcha' => $cap['word'],
            );
            $query = $this->db->insert_string('Captcha',$captcha);
            $this->db->query($query);
            $this->load->view($this->_public_view, $data);
        }else{
            //kondisi pengisian form sukses, simpan komentar ke basis data
            $this->basic_model->simpan_komentar($Id_artikel_teks);
        }
        //$this->load->view($this->_public_view,$data);
    }    
    private function __komentar(){
        $this->load->library('form_validation');
        $this->valid = $this->form_validation;//persingkat nama agar lebih mudah digunakan        
        $this->valid->set_rules('visitorname', 'Nama anda', 
                'required|min_length[3]|max_length[20]');
        $this->valid->set_rules('email', 'Email anda', 'required|valid_email');
        $this->valid->set_rules('comment', 'Komentar', 
                'required|xss_clean|min_length[3]|max_length[1000]');
        $this->valid->set_rules('captcha', 'Captcha', 
                'required|callback_cek_captcha');        
        return ($this->form_validation->run() == FALSE)? FALSE:TRUE;
    }
    public function smileys_table(){
        $this->load->helper('smiley');
        $this->load->library('table');
        //ngambil gambar smiley
        $img_array = get_clickable_smileys(base_url().'aset/smileys/','comment');
        //buat array kolom
        $col_array = $this->table->make_columns($img_array,16);
        //return tabel smiley
        return ($this->table->generate($col_array));
    }
    public function cek_captcha(){
        $expired = time()-300;
        $this->db->query('DELETE FROM Captcha WHERE Time_captcha < '.$expired);
        $sql = "SELECT COUNT(*) AS count FROM Captcha WHERE Word_captcha = ? 
            AND Ip_captcha = ? AND Time_captcha > ?";
        $binds = array($this->input->post('Captcha'), $this->input->ip_address(),
            $expired);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();
        if($row->count == 0){
            $this->form_validation->set_message('cek_captcha', 'Kode captcha telah 
                kadaluarsa atau tidak sesuai');
            return FALSE;
        }else{
            return TRUE;
        }
    }
}

?>
