<?php

declare(strict_types=1);

namespace TMogdans\JsonApiProblemResponder\Exceptions;

class NotFoundException extends BaseException
{
    protected int $status = 404;

    public function __construct(
        protected string $detail = 'Not Found',
        protected string $title = 'Not Found',
        protected string $instance = '',
        protected string $type = ''
    ) {
        parent::__construct($this->detail);
    }
}
