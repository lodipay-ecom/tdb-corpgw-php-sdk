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
    public float $amount;

    /**
     * Гүйлгээ хийсэн ханш
     * Example: 1
     */
    #[SerializedPath('[TxRt]')]
    public float $txRate;

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
    public int $ctBankNo;

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
    public string $TxPostDate;
}
