<?php

namespace Lodipay\TdbCorpGwSDK\Dto\Client;

use Lodipay\TdbCorpGwSDK\Dto\GetBalanceReqDto;
use Tsetsee\DTO\DTO\TseDTO;
use Symfony\Component\Serializer\Attribute\SerializedPath;

class BalanceReqDocument extends TseDTO
{
    #[SerializedPath('[GrpHdr]')]
    public ?GroupHeaderReq $header = null;

    #[SerializedPath('[EnqInf]')]
    public ?GetBalanceReqDto $info = null;
}
