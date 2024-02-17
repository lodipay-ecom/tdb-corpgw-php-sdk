<?php

namespace Lodipay\TdbCorpGwSDK\Dto\Client;

use Lodipay\TdbCorpGwSDK\Dto\GetStatementsResDto;
use Symfony\Component\Serializer\Attribute\SerializedPath;
use Tsetsee\DTO\DTO\TseDTO;

class StatementResDocument extends TseDTO
{
    #[SerializedPath('[GrpHdr]')]
    public ?GroupHeaderRes $header = null;

    /**
     * @var array<GetStatementsResDto>
     */
    #[SerializedPath('[EnqRsp][Ntry]')]
    public mixed $response;
}
