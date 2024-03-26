<?php

namespace Lodipay\TdbCorpGwSDK\Dto;

use Lodipay\DTO\DTO\TseDTO;
use Symfony\Component\Serializer\Attribute\SerializedPath;

class GetBalanceReqDto extends TseDTO
{

    /**
     * Дансны дугаар
     * Example: 45092379792
     */
    #[SerializedPath('[IBAN]')]
    public string $accountNo;

    /**
     * Дансны валют
     * Example: MNT
     */
    #[SerializedPath('[Ccy]')]
    public string $currency;
}
