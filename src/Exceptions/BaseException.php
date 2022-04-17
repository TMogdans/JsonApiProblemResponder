<?php

declare(strict_types=1);

namespace TMogdans\JsonApiProblemResponder\Exceptions;

use Exception;

abstract class BaseException extends Exception
{
    protected int $status;

    protected string $title;

    protected string $detail;

    protected string $type;

    protected string $instance;

    protected array $additionalDetails = [];

    public function __construct(string $message)
    {
        parent::__construct($message);
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): BaseException
    {
        $this->status = $status;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): BaseException
    {
        $this->title = $title;

        return $this;
    }

    public function getDetail(): string
    {
        return $this->detail;
    }

    public function setDetail(string $detail): BaseException
    {
        $this->detail = $detail;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): BaseException
    {
        $this->type = $type;

        return $this;
    }

    public function getInstance(): string
    {
        return $this->instance;
    }

    public function setInstance(string $instance): BaseException
    {
        $this->instance = $instance;

        return $this;
    }

    public function getAdditionalDetails(): array
    {
        return $this->additionalDetails;
    }

    public function setAdditionalDetails(array $additionalDetails): BaseException
    {
        $this->additionalDetails = $additionalDetails;

        return $this;
    }

    public function addAdditionalDetail(string $additionalDetail): BaseException
    {
        $this->additionalDetails[] = $additionalDetail;

        return $this;
    }

    public function toss(): void
    {
        throw $this;
    }

    public function toArray(): array
    {
        $error = [
            'status' => $this->status,
            'title' => $this->title,
            'detail' => $this->detail,
            'type' => $this->type,
            'instance' => $this->instance
        ];

        $error = array_merge($error, $this->additionalDetails);

        return array_filter($error);
    }
}
