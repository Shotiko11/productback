<?php

namespace api\core\Interface;

interface ApiInterface
{
    public function hendle(): array;

    public function send(array $response);
}
