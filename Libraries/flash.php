<?php
if(!isset($_SESSION)){
    session_start();
}

function flash($name = '', $message = '', $class = 'form-message form-message-red'){
    if(!empty($name)){
        if(!empty($message) && empty($_SESSION[$name])){
            $_SESSION[$name] = $message;
            $_SESSION[$class] = $class;
        }else if(empty($message) && !empty($_SESSION[$name])){
            $class = !empty($_SESSION[$class]) ? $_SESSION[$class] : $class;
            echo '<div class="'.$class.'" >'.$_SESSION[$name].'</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$class]);
        }
    }
}