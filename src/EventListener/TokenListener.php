<?php
namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use App\Services\TokenValidatorService;
class TokenListener
{
    private $tokenValidatorService;
    public function __construct(TokenValidatorService $tokenValidatorService)
    {
        $this->tokenValidatorService = $tokenValidatorService;
    }
    public function onKernelController(ControllerEvent $event)
    {
        $token = $event->getRequest()->headers->get('Authorization');
        if (!$this->tokenValidatorService->validate($token))
            throw new AccessDeniedHttpException('Sin autorizacionm. Token invalido.');
    }
}