<?php

namespace Lodipay\TdbCorpGwSDK\Dto;

use Tsetsee\DTO\DTO\TseDTO;
use Symfony\Component\Serializer\Attribute\SerializedPath;

class GetBalanceResDto extends TseDTO
{
    /**
     * Банкны бизнес огноо
     * Example: 2014-10-30
     */
    #[SerializedPath('[RptDt]')]
    public string $reportDate;

    /**
     * Боломжит үлдэгдэл
     * Example: 1,050,000.00
     */
    #[SerializedPath('[ABal]')]
    public string $availableBalance;

    /**
     * Үлдэгдэл
     * Example: 100,000.00
     */
    #[SerializedPath('[Bal]')]
    public string $balance;
}
