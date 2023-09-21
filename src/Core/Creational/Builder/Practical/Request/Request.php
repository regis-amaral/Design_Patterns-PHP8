<?php

namespace Core\Creational\Builder\Pratictical\Request;

class Request
{
    public function __construct(
        public ?string $url = '',
        public ?array $payload = [],
        public ?MethodsEnum $method = null
    ){}
}