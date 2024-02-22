<?php

namespace Lodipay\TdbCorpGwSDK\Dto;

use Tsetsee\DTO\DTO\TseDTO;
use Symfony\Component\Serializer\Attribute\SerializedPath;

class GetStatementsResDto extends TseDTO
{
    /**
     * Журналын дугаар
     * Example: 776000013510
     */
    #[SerializedPath('[NtryRef]')]
    public string $journalNo;

    /**
     * Гүйлгээний дүн
     * Example: 300000
     */
    #[SerializedPath('[Amt]')]
    private float $amount;

    /**
     * Дансны валют
     * Example: MNT
     */
    #[SerializedPath('[Ccy]')]
    public string $currency;

    /**
     * Гүйлгээ хийсэн ханш
     * Example: 1
     */
    #[SerializedPath('[TxRt]')]
    private int $txRate;

    /**
     * Гүйлгээ хийгдсэн огноо
     * Example: 2021-03-31
     */
    #[SerializedPath('[TxDt]')]
    public string $txDate;

    /**
     * Харьцсан данс
     * Example: 48849611700
     */
    #[SerializedPath('[CtAcct]')]
    public string $contraAccount;

    /**
     * Гүйлгээний утга
     * Example: test
     */
    #[SerializedPath('[TxAddInf]')]
    public string $txInfo;

    /**
     * Жинхэнэ данс
     * Example: 5021534104
     */
    #[SerializedPath('[CtAcntOrg]')]
    public ?string $ctAccountNo;

    /**
     * Банкны дугаар
     * Example: 10000
     */
    #[SerializedPath('[CtBankNo]')]
    private int $ctBankNo;

    /**
     * Данс эзэмшигчийн нэр
     * Example: tester
     */
    #[SerializedPath('[CtActnName]')]
    public ?string $ctAccountName;

    /**
     * Гүйлгээ хийсэн цаг, минут
     * Format: HH24:MM
     * Example: 18:24
     */
    #[SerializedPath('[TxTime]')]
    public string $txTime;

    /**
     * Гүйлгээ хийсэн серверийн огноо
     * Format: MM/DD/YYYY HH12:MM:SI
     * Example: 4/2/2021 6:24:40 PM
     */
    #[SerializedPath('[TxPostDate]')]
    public string $txPostDate;

    /**
     * Get the value of amount
     *
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * Set the value of amount
     *
     * @param string|float $amount
     *
     * @return self
     */
    public function setAmount(string|float $amount): self
    {

        $this->amount = is_string($amount) ? (float)$amount : $amount;
        return $this;
    }

    /**
     * Get the value of txRate
     *
     * @return int
     */
    public function getTxRate(): int
    {
        return $this->txRate;
    }

    /**
     * Set the value of txRate
     *
     * @param string|int $txRate
     *
     * @return self
     */
    public function setTxRate(string|int $txRate): self
    {
        $this->txRate = is_string($txRate) ? (int)$txRate : $txRate;
        return $this;
    }

    /**
     * Get the value of ctBankNo
     *
     * @return int
     */
    public function getCtBankNo(): int
    {
        return $this->ctBankNo;
    }

    /**
     * Set the value of ctBankNo
     *
     * @param string|int $ctBankNo
     *
     * @return self
     */
    public function setCtBankNo(string|int $ctBankNo): self
    {
        $this->ctBankNo = is_string($ctBankNo) ? (int)$ctBankNo : $ctBankNo;
        return $this;
    }
}
