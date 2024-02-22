<?php

namespace Lodipay\TdbCorpGwSDK\Dto\Client;

use Lodipay\TdbCorpGwSDK\Dto\GetStatementsResDto;
use Symfony\Component\Serializer\Attribute\SerializedPath;
use Tsetsee\DTO\DTO\TseDTO;

class StatementResDocument extends TseDTO
{
    #[SerializedPath('[GrpHdr]')]
    public GroupHeaderRes $header;

    /** @var array<GetStatementsResDto> $response */
    #[SerializedPath('[EnqRsp][Ntry]')]
    public array $response;

    /**
     * @return GetStatementsResDto[] 
     */
    public function getGetStatementsArray(): array
    {
        return \count($this->response) > 0 && is_array($this->response[0]) ? GetStatementsResDto::fromArray($this->response) : GetStatementsResDto::fromArray([$this->response]);
    }
}
