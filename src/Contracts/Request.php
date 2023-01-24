<?php

declare(strict_types=1);

namespace Saloon\Contracts;

use Throwable;
use Saloon\Enums\Method;
use Saloon\Contracts\ArrayStore as ArrayStoreContract;

interface Request extends Authenticatable, CanThrowRequestExceptions, Conditionable, HasConfig, HasHeaders, HasMiddlewarePipeline, HasMockClient, HasQueryParams, Makeable
{
    /**
     * Get the HTTP method
     *
     * @return \Saloon\Enums\Method
     */
    public function getMethod(): Method;

    /**
     * Define the endpoint for the request.
     *
     * @return string
     */
    public function resolveEndpoint(): string;

    /**
     * Handle the boot lifecycle hook
     *
     * @param \Saloon\Contracts\PendingRequest $pendingRequest
     * @return void
     */
    public function boot(PendingRequest $pendingRequest): void;

    /**
     * Cast the response to a DTO.
     *
     * @param \Saloon\Contracts\Response $response
     * @return mixed
     */
    public function createDtoFromResponse(Response $response): mixed;

    /**
     * Get the response class
     *
     * @return string|null
     */
    public function resolveResponseClass(): ?string;
}
