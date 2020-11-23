<?php if(!defined('BASEPATH')) exit('Akses langsung tdk dibolehkan');
//wrapper.php utk tampilan publik
$config['public_view'] = 'wrapper';
$config['admin_view'] = 'admin/';
$config['user_level'] = array(
    1 => 'super_user',
    2 => 'user'
);
$config['default_user'] = 2;
$config['admin_view'] = 'admin/';
$config['captcha_word'] = array(
    'kopi',
    'teh',
    'roti',
    'susu',
    'pisang',
    'bombay',
    'gula',
    'garam',
    'manis',
    'asin',
    'kecut',
);
$config['captcha_num'] = array(
  '029',  
  '021',  
  '019',  
  '009',  
  '129',  
  '345',  
  '315',  
  '245',  
  '999',  
  '029',  
  '109',  
);
?>
