<?php

declare(strict_types=1);

namespace TMogdans\JsonApiProblemResponder\Exceptions;

class InternalErrorException extends BaseException
{
    protected int $status = 500;

    public function __construct(
        protected string $detail = 'Internal Error',
        protected string $title = 'Internal Error',
        protected string $instance = '',
        protected string $type = ''
    ) {
        parent::__construct($this->detail);
    }
}
