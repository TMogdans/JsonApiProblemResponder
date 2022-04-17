<?php

declare(strict_types=1);

namespace TMogdans\JsonApiProblemResponder\Exceptions;

class NotModifiedException extends BaseException
{
    protected int $status = 304;

    public function __construct(
        protected string $detail = 'Resource not modified',
        protected string $title = 'Resource not modified',
        protected string $instance = '',
        protected string $type = ''
    ) {
        parent::__construct($this->detail);
    }
}
