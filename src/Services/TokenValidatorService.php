<?php


namespace App\Services;


class TokenValidatorService
{
    public function validate(string $token)
    {
        $authorizationType = 'Bearer';
        $desiredToken = '123a';
        $tokenEvaluated = $authorizationType.' '.$desiredToken;
        return ( $token === $tokenEvaluated)? true : false;
    }
}