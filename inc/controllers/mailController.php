<?php 

class Mail {

    public static function index($request)
    {
        return self::sendMail($request->get_params(), $request->get_file_params());
    }


//    public static function sendMail($mailData, $files = false)
//    {
//
//        $to = ['info@interopx.com'];
//        $subject = "New message from website";
//
//        $body = "Hi,<br> You have new message from website<br><br>";
//
//        foreach($mailData as $key=>$value){
//			if($key == 'g-recaptcha-response') continue;
//            $body .= "<b>". str_replace("_"," ",$key) .":</b> ". $value. "<br>";
//        }
//
//        $headers = array('Content-Type: text/html; charset=UTF-8','From: <'.$mailData['Email'].'>');
//        $headers[] = 'From: '.$mailData['Name'].' <'.$mailData['Email'].'>';
//        $headers[] = 'Content-Type: text/html; charset=UTF-8';
//
//        $attachments = [];
//
//        if($files) {
//            foreach($files as $file) {
//                if(!$file['name']) continue;
//                move_uploaded_file($file['tmp_name'], get_template_directory().'/temp_uploads/'.$file['name']);
//                $attachments[] = get_template_directory().'/temp_uploads/'.$file['name'];
//            }
//        }
//
//        if(wp_mail( $to, $subject, $body, $headers, $attachments)) {
//            echo wp_json_encode([
//                'status' => true,
//                'message' => 'Thank you for contacting InteropX, we will respond to your questions shortly.'
//            ]);
//            foreach($attachments as $attach) {
//                unlink($attach);
//            }
//            die();
//        }
//        echo wp_json_encode([
//            'status' => false,
//            'message' => "Something went wrong. Please try again!",
//        ]);
//        die();
//    }

    public static function sendMail($mailData, $files = false)
    {
        $referrerURL = '';
        if (isset($_COOKIE['referrerURL'])) {
            $referrerURL = $_COOKIE['referrerURL'];
        }

        $to = ['info@interopx.com'];
        $subject = "New message from website";

        // Create the email body
        $body = "Hi,<br> You have a new message from the website<br><br>";
        foreach($mailData as $key => $value) {
            if ($key == 'g-recaptcha-response') continue; // Skip reCAPTCHA response
            $body .= "<b>" . str_replace("_", " ", $key) . ":</b> " . esc_html($value) . "<br>" ;
        }

        // Check if the body string is not empty
        if (!empty($body) && !empty($referrerURL)) {
            $body .= "<b>Came From:</b> " . esc_html($referrerURL) . "<br>" ;; // Concatenate the additional string
        }

        // Set email headers
        $headers = [
            'Content-Type: text/html; charset=UTF-8',
            'From: ' . $mailData['Name'] . ' <' . sanitize_email($mailData['Email']) . '>',
        ];

        $attachments = [];
        if ($files) {
            foreach ($files as $file) {
                if (!$file['name']) continue;
                $uploadedFile = get_template_directory() . '/temp_uploads/' . $file['name'];
                if (move_uploaded_file($file['tmp_name'], $uploadedFile)) {
                    $attachments[] = $uploadedFile;
                }
            }
        }

        // Send the email
        if (wp_mail($to, $subject, $body, $headers, $attachments)) {
            // Clean up attachments
            foreach ($attachments as $attach) {
                unlink($attach);
            }

            // Send a JSON response indicating success
            wp_send_json([
                'status' => true,
                'message' => 'Thank you for contacting InteropX, we will respond to your questions shortly.'
            ]);
        } else {
            // Send a JSON response indicating failure
            wp_send_json([
                'status' => false,
                'message' => "Something went wrong. Please try again!",
            ], 500); // Optional: set HTTP status code to 500 (Internal Server Error)
        }
    }
}