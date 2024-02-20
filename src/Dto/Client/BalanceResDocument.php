<?php

namespace Lodipay\TdbCorpGwSDK\Dto\Client;

use Lodipay\TdbCorpGwSDK\Dto\GetBalanceResDto;
use Tsetsee\DTO\DTO\TseDTO;
use Symfony\Component\Serializer\Attribute\SerializedPath;

class BalanceResDocument extends TseDTO
{
    #[SerializedPath('[GrpHdr]')]
    public GroupHeaderRes $header;

    #[SerializedPath('[EnqRsp]')]
    public GetBalanceResDto $response = null;
}
