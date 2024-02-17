<?php

namespace Lodipay\TdbCorpGwSDK\Dto\Client;

use Lodipay\TdbCorpGwSDK\Dto\BankTransferResDto;
use Symfony\Component\Serializer\Attribute\SerializedPath;
use Tsetsee\DTO\DTO\TseDTO;

class BankTransferResDocument extends TseDTO
{
    #[SerializedPath('[GrpHdr]')]
    public ?GroupHeaderRes $header = null;

    /**
     * @var array<BankTransferResDto>
     */
    #[SerializedPath('[OrgnlPmtInfAndSts]')]
    public mixed $response;
}
