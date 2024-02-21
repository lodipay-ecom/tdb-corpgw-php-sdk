<?php

namespace Lodipay\TdbCorpGwSDK\Exception;

class CorpGwException extends \Exception
{
    public function __construct(string $message = 'Алдаа!', int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
