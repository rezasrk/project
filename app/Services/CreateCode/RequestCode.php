<?php


namespace App\Services\CreateCode;


interface RequestCode
{
    public function code();

    public function parameters($parameters) : self ;
}
