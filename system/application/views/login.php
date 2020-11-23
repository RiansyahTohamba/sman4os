<html>
    <head>
        <title> SMAN4OS - login</title>
        <style>            
            .form_login{ 
                margin: 150px auto;
                width: 300px;
                height: 250px;
                border-radius: 10px;
                border: 2px solid black;                                
            }
            input{
                font: normal 1.1em arial;
                margin: 10px 50px;
                margin-bottom: 10px;                
            }
        </style>
    </head>
    <body>
        <div class="form_login">            
            <h2 align="center"> LOGIN SMAN4 OS</h2>            
<?php    
    echo form_open('');
    echo form_input(array('placeholder'=>'username....'),  set_value('user'));
    echo form_input(array('placeholder'=>'password....'), set_value('sandi'));
    echo form_submit('submit','login');
    echo form_close();
?>
        </div>
    </body>
</html>
