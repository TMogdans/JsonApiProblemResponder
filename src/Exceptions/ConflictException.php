<?php

declare(strict_types=1);

namespace TMogdans\JsonApiProblemResponder\Exceptions;

class ConflictException extends BaseException
{
    protected int $status = 409;

    public function __construct(
        protected string $detail = 'Conflict Error',
        protected string $title = 'Conflict Error',
        protected string $instance = '',
        protected string $type = ''
    ) {
        parent::__construct($this->detail);
    }
}
