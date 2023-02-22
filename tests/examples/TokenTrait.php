<?php

namespace tests\examples;

use pkpudev\graph\AccessToken;

trait TokenTrait
{
    public function getToken()
    {
        // TODO: add cache

        $accessToken = new AccessToken(
            $_ENV['TENANT_ID'],
            $_ENV['CLIENT_ID'],
            $_ENV['CLIENT_SECRET']
        );

        return $accessToken->generate();
    }
}
