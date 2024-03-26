<?php

namespace Lodipay\TdbCorpGwSDK\Dto\Client;

use Lodipay\TdbCorpGwSDK\Dto\BankTransferResDto;
use Symfony\Component\Serializer\Attribute\SerializedPath;
use Lodipay\DTO\DTO\TseDTO;

class BankTransferResDocument extends TseDTO
{
    #[SerializedPath('[GrpHdr]')]
    public GroupHeaderRes $header;

    #[SerializedPath('[OrgnlPmtInfAndSts]')]
    public ?BankTransferResDto $response = null;
}
