<?php

class Routes
{

    public function __construct()
    {
        $this->routes();
    }

//    public function response($data)
//    {
//        wp_reset_postdata();
//        header('Content-Type: application/json');
//        if (!$data) {
//            $data = [];
//        }
//        wp_send_json($data, 200);
//        die();
//    }

    public function response($data = [], $status = 200)
    {
        // Ensure $data is always an array
        if (!is_array($data)) {
            $data = [];
        }

        // Use wp_send_json which handles headers and exits automatically
        wp_send_json($data, $status);
    }

    public function addAction($name, $cb, $method = "GET")
    {
        add_action('rest_api_init', function () use ($cb, $name, $method) {
            register_rest_route('api/v1', $name, [
                'methods' => $method,
                'callback' => $cb,
            ]);
        });
    }

    public function routes()
    {
        $this->addAction("/sendMail", function (WP_REST_Request $request) {
            $this->response(Mail::index($request));
        }, 'POST');
    }
}
