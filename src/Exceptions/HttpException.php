<?php

declare(strict_types=1);

namespace TMogdans\JsonApiProblemResponder\Exceptions;

class HttpException extends BaseException
{
    protected int $status = 500;

    public function __construct(
        protected string $detail = "Error Occured",
        protected string $title = 'Error Occured',
        protected string $instance = '',
        protected string $type = ''
    ) {
        parent::__construct($this->detail);
    }
}
