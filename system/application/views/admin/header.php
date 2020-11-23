<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $page_title?></title>        
        <?php
        $meta = array(
            array("name"=>"author","content"=>"Muhammad Riansyah"),
            array("name"=>"description","content"=>"SMAN4 OS : Komunitas Pengembang SMAN4 OS"),
            array("name"=>"author","content"=>"Sistem Operasi, Open Source, Edukasi, Indonesia"),
            array("name"=>"robots","content"=>"noindex,follow"),
            array("name"=>"Content-type","content"=>"text/html; charset = utf-8","type"=>"equiv"),
        );
        echo meta($meta);//menampilkan meta
        echo link_tag('aset/publik_style.css');// link css publik 
        //menampilkan link feed rss
        //echo link_tag(site_url('rss'),'alternate','aset/publik_style.css');        
        //menampilkan JS smiley
        if(function_exists('smiley_js')){
            echo smiley_js();
        }
        ?>
    </head>
    <body>
        <div id="wrapper">
            <div id="header">                            
                <div id="logo"> <?php echo anchor(base_url(), img(base_url().'aset/images/logo1.png'))?></div>
                <div id="nav-menu-dashboard">
                    <li><?php echo anchor('blog/list','Blog');?> </li>
                    <li><?php echo anchor('download/list','Download');?>  </li>
                    <li><?php echo anchor(base_url(),'Komunitas');?> </li>
                    <li><?php echo anchor(base_url(),'Dokumentasi');?>  </li>
                    <li><?php echo anchor(base_url(),'Tentang Kami');?> </li>
                </div>
            </div>
        <!-- ==================== HEADER ===================--->                        

