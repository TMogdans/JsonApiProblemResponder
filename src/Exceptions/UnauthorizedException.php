<?php

declare(strict_types=1);

namespace TMogdans\JsonApiProblemResponder\Exceptions;

class UnauthorizedException extends BaseException
{
    protected int $status = 401;

    public function __construct(
        protected string $detail = 'Unauthorized Exception',
        protected string $title = 'Unauthorized Exception',
        protected string $instance = '',
        protected string $type = ''
    ) {
        parent::__construct($this->detail);
    }
}
