<?php

declare(strict_types=1);

namespace TMogdans\JsonApiProblemResponder\Exceptions;

class ForbiddenException extends BaseException
{
    protected int $status = 403;

    public function __construct(
        protected string $detail = 'Forbidden Exception',
        protected string $title = 'Forbidden Exception',
        protected string $instance = '',
        protected string $type = ''
    ) {
        parent::__construct($this->detail);
    }
}
