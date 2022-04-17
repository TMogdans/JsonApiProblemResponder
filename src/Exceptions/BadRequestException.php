<?php

declare(strict_types=1);

namespace TMogdans\JsonApiProblemResponder\Exceptions;

class BadRequestException extends BaseException
{
    protected int $status = 400;

    public function __construct(
        protected string $detail = 'Bad Request',
        protected string $title = 'Bad Request',
        protected string $instance = '',
        protected string $type = ''
    ) {
        parent::__construct($this->detail);
    }
}
