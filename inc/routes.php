<?php

class Routes
{

    public function __construct()
    {
        $this->routes();
    }

    public function response($data)
    {
        wp_reset_postdata();
        header('Content-Type: application/json');
        if (!$data) {
            $data = [];
        }
        wp_send_json($data, 200);
        die();
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
