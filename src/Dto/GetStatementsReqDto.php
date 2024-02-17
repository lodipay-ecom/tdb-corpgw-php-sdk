<?php

namespace Lodipay\TdbCorpGwSDK\Dto;

use Tsetsee\DTO\DTO\TseDTO;
use Symfony\Component\Serializer\Attribute\SerializedPath;

class GetStatementsReqDto extends TseDTO
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

    /**
     * Эхлэх огноо
     * Example: 2024-01-21
     */
    #[SerializedPath('[FrDt]')]
    public string $fromDate;

    /**
     * Дуусах огноо
     * Example: 2024-01-28
     */
    #[SerializedPath('[ToDt]')]
    public string $toDate;

    /**
     * Журналын дугаар. Тухайн журналын дугаараас хойших
     * Example: 1234
     */
    #[SerializedPath('[JrNo]')]
    public ?string $journalNo;
}
