<?php

namespace Lodipay\TdbCorpGwSDK\Dto;

use Lodipay\DTO\DTO\TseDTO;
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
    private float $availableBalance;

    /**
     * Үлдэгдэл
     * Example: 100,000.00
     */
    #[SerializedPath('[Bal]')]
    private float $balance;

    /**
     * Get the value of availableBalance
     *
     * @return float
     */
    public function getAvailableBalance(): float
    {
        return $this->availableBalance;
    }

    /**
     * Set the value of availableBalance
     *
     * @param string|float $availableBalance
     *
     * @return self
     */
    public function setAvailableBalance(string|float $availableBalance): self
    {
        $this->availableBalance = is_string($availableBalance) ? (float)$availableBalance : $availableBalance;
        return $this;
    }

    /**
     * Get the value of balance
     *
     * @return float
     */
    public function getBalance(): float
    {
        return $this->balance;
    }

    /**
     * Set the value of balance
     *
     * @param string|float $balance
     *
     * @return self
     */
    public function setBalance(string|float $balance): self
    {
        $this->balance = is_string($balance) ? (float)$balance : $balance;
        return $this;
    }
}
