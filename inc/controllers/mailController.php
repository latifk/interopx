<?php 

class Mail {

    public static function index($request)
    {
        return self::sendMail($request->get_params(), $request->get_file_params());
    }


    public static function sendMail($mailData, $files = false)
    {
		
        $to = ['info@interopx.com'];
        $subject = "New message from website";

        $body = "Hi,<br> You have new message from website<br><br>";
        
        foreach($mailData as $key=>$value){
			if($key == 'g-recaptcha-response') continue;
            $body .= "<b>". str_replace("_"," ",$key) .":</b> ". $value. "<br>";
        }

        $headers = array('Content-Type: text/html; charset=UTF-8','From: <'.$mailData['Email'].'>');
        $headers[] = 'From: '.$mailData['Name'].' <'.$mailData['Email'].'>';
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
        
        $attachments = [];

        if($files) {
            foreach($files as $file) {
                if(!$file['name']) continue;
                move_uploaded_file($file['tmp_name'], get_template_directory().'/temp_uploads/'.$file['name']);
                $attachments[] = get_template_directory().'/temp_uploads/'.$file['name'];
            }
        }

        if(wp_mail( $to, $subject, $body, $headers, $attachments)) {
            echo wp_json_encode([
                'status' => true,
                'message' => 'Thank you for contacting InteropX, we will respond to your questions shortly.'
            ]);
            foreach($attachments as $attach) {
                unlink($attach);
            }
            die();
        }
        echo wp_json_encode([
            'status' => false,
            'message' => "Something went wrong. Please try again!",
        ]);
        die();
    }    
}