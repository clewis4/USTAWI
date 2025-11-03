<?php
if (!captcha_is_valid($_POST['g-recaptcha-response'] ?? '')) { 
    http_response_code(400); 
    echo 'CAPTCHA failed'; 
    exit(); 
}
?>