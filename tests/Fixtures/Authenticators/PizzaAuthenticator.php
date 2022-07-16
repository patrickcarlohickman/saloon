<?php

namespace Sammyjo20\Saloon\Tests\Fixtures\Authenticators;

use Sammyjo20\Saloon\Http\PendingSaloonRequest;
use Sammyjo20\Saloon\Http\SaloonRequest;
use Sammyjo20\Saloon\Interfaces\AuthenticatorInterface;

class PizzaAuthenticator implements AuthenticatorInterface
{
    /**
     * @param string $pizza
     * @param string $drink
     */
    public function __construct(
        public string $pizza,
        public string $drink,
    ) {
        //
    }

    /**
     * Set the pending request.
     *
     * @param PendingSaloonRequest $pendingRequest
     * @return void
     */
    public function set(PendingSaloonRequest $pendingRequest): void
    {
        $pendingRequest->headers()->add('X-Pizza', $this->pizza);
        $pendingRequest->headers()->add('X-Drink', $this->drink);

        $pendingRequest->config()->add('debug', true);
    }
}
