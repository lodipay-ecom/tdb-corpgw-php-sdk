<?php

namespace Lodipay\TdbCorpGwSDK\Dto\Client;

use Lodipay\TdbCorpGwSDK\Dto\BankTransferReqDto;
use Tsetsee\DTO\DTO\TseDTO;
use Symfony\Component\Serializer\Attribute\SerializedPath;

class BankTransferReqDocument extends TseDTO
{
    #[SerializedPath('[GrpHdr]')]
    public ?GroupHeaderReq $header = null;

    #[SerializedPath('[PmtInf]')]
    public ?BankTransferReqDto $info = null;
}
