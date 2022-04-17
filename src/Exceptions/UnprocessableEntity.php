<?php

declare(strict_types=1);

namespace TMogdans\JsonApiProblemResponder\Exceptions;

class UnprocessableEntity extends BaseException
{
    protected int $status = 422;

    public function __construct(
        protected string $detail = 'Unprocessable Entity',
        protected string $title = 'Unprocessable Entity',
        protected string $instance = '',
        protected string $type = ''
    ) {
        parent::__construct($this->detail);
    }
}
