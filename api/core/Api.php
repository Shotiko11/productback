<?php

namespace api\core;

use api\core\Interface\ApiInterface;


class Api implements ApiInterface
{

    public function __construct(private array $request)
    {
        $this->hendle_preflight_request();
    }

    public function hendle(): array
    {

        $uri = $this->request["URI"];
        if (Register::is_allowed_URI($uri)) {
            return Register::call_starter_function($this->request);
        } else {
            header("HTTP/1.0 404 Not Found");
            return [
                "message" => "404 Not Found"
            ];
        }
    }

    public function send(array $response): void
    {
        echo json_encode($response);
    }

    private function hendle_preflight_request()
    {
        if ($this->request["method"] === "OPTIONS") {
            header("HTTP/1.0 200 OK");
            exit();
        }
    }
}
