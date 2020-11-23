<?php
echo "<div id=\"blog\">";
    echo "<div id=\"detail_artikel\">";
        echo $query;
    echo "</div>";
    echo '<div class="form_komentar">';
        echo "<h3>Tuliskan Komentar</h3>";
        $req = '<sup>*</sup>';        
        echo form_open('artikel/detail/'. $id, array('name' => 'artikel_komentar'));
        echo form_label('Nama anda' . $req . '<small><i>minimal 3 karakter, 
            maksimal 250 karakter</i></small>', 'for="visitorname"') . "<br/>";
        echo form_error('visitorname','<div class="error">','</div>');
        echo form_input('visitorname', set_value('visitorname'))."<br/>";
        echo form_label('Email anda'.$req ,'for="email"'). "<br/>";
        echo form_error('email','<div class="error">','</div>');
        echo form_input('email', set_value('email'))."<br/>";
        echo form_label('Komentar' . $req . '<small><i>minimal 3 karakter, 
            maksimal 1000 karakter</i></small>', 'for="comment"') . "<br/>";        
        echo form_error('comment','<div class="error">','</div>');
        echo form_textarea(array('name'=>'comment','id'=>'comment','cols'=>'45','rows'=>'8',
            'maxlength'=>'1000','size'=>'50'), set_value('comment'))."<br/>";
        echo '<small>klik smiley untuk memasukkannya dalam komentar</small>';
        echo $emot_tabel;
        echo form_hidden('title_id',$id);
        echo form_label('captcha',$req,'for="captcha"').'<br/>';
        echo $captcha_img."<br/>";
        echo form_error('captcha', '<div class="error">','</div>');
        echo form_input('captcha')."<br/><br/>";
        echo form_submit('submit','Kirim Komentar');
        echo form_close();        
    echo '</div>';
    echo "<div id=\"popular_post\"> 
        <h2> Top Posting</h2>";
        //echo $popular_post;
    echo "</div>";
    echo "<div id=\"arsip_post\"> 
        <h2> Recent Post</h2>";
        echo $arsip_post;
    echo "</div>";
    echo '<div class="list_komentar">';        
        echo $komentar;
    echo '</div>';    
echo "</div>";
?>

