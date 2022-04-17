<?php

declare(strict_types=1);

namespace TMogdans\JsonApiProblemResponder\Exceptions;

class MethodNotAllowedException extends BaseException
{
    protected int $status = 405;

    public function __construct(
        protected string $detail = 'Method not allowed',
        protected string $title = 'Method not allowed',
        protected string $instance = '',
        protected string $type = ''
    ) {
        parent::__construct($this->detail);
    }
}
