<?php

namespace App\Services;

use App\Service\Traits\ConsumerExternalService;

class CompanyServices
{
    use ConsumerExternalService;

    protected $token;
    protected $url;

    public function __constuct()
    {
        $this->token = config('services.micro_01.token');
        $this->url = config('services.micro_01.url');
    }

    public function getCompany(string $company){
        $response = $this->request('get', "/companies/{$company}");

    }
}
