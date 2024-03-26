<?php

namespace Lodipay\TdbCorpGwSDK\Dto\Client;

use Lodipay\TdbCorpGwSDK\Dto\GetStatementsReqDto;
use Lodipay\DTO\DTO\TseDTO;
use Symfony\Component\Serializer\Attribute\SerializedPath;

class StatementReqDocument extends TseDTO
{
    #[SerializedPath('[GrpHdr]')]
    public ?GroupHeaderReq $header = null;

    #[SerializedPath('[EnqInf]')]
    public ?GetStatementsReqDto $info = null;
}
