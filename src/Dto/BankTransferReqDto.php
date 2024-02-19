<?php

namespace Lodipay\TdbCorpGwSDK\Dto;

use Tsetsee\DTO\DTO\TseDTO;
use Symfony\Component\Serializer\Attribute\SerializedPath;

class BankTransferReqDto extends TseDTO
{

    /**
     * Гүйлгээний тоо
     * Example: 1
     */
    #[SerializedPath('[NbOfTxs]')]
    public int $numberOfTxs;

    /**
     * Гүйлгээний нийлбэр дүн. Валют хамаарахгүй. Ж нь: 500USD, 100EUR гэвэл 600 байна.
     * Example: 1,000
     */
    #[SerializedPath('[CtrlSum]')]
    public ?float $controlSum;

    /**
     * Аль дүнг чухалчилж үзэх. F-Илгээгч, Т-Хүлээн авагч
     * Example: F
     */
    #[SerializedPath('[ForT]')]
    public string $forT;

    /**
     * Шилжүүлэгчийн нэр
     * Example: Lodipay LLC
     */
    #[SerializedPath('[Dbtr]')]
    public string $debtorName;

    /**
     * International bank account number. Шилжүүлэгчийн дансны дугаар
     * Example: EE481012345678901234
     */
    #[SerializedPath('[DbtrAcct][Id][IBAN]')]
    public string $debtorIBAN;

    /**
     * Шилжүүлэгчийн дансны валют
     * Example: MNT
     */
    #[SerializedPath('[DbtrAcct][Ccy]')]
    public string $debtorCurrency;

    /**
     * Гүйлгээний дүн - хүлээн авах дансны валютаар
     * Example: MNT
     */
    #[SerializedPath('[CdtTrfTxInf][Amt][InstdAmt]')]
    public float $instructedAmount;

    /**
     * Гүйлгээний дүн – илгээгч дансын валютаар
     * Example: MNT
     */
    #[SerializedPath('[CdtTrfTxInf][Amt][EqvtAmt]')]
    public ?float $equivalentAmount;

    /**
     * Хүлээн авагчийн нэр
     * Example: MNT
     */
    #[SerializedPath('[CdtTrfTxInf][Cdtr][Nm]')]
    public string $creditorName;

    /**
     * Хүлээн авагчийн дансны дугаар
     * Example: MNT
     */
    #[SerializedPath('[CdtTrfTxInf][Cdtr][Id][IBAN]')]
    public string $creditorIBAN;

    /**
     * Хүлээн авагчийн дансны валют
     * Example: MNT
     */
    #[SerializedPath('[CdtTrfTxInf][Cdtr][Id][Ccy]')]
    public string $creditorCurrency;

    /**
     * Хүлээн авах банкны код- банк хооронд бол заавал явуулна
     * Example: TDBM
     */
    #[SerializedPath('[CdtTrfTxInf][CdtrAgt][FinInstnId][BICFI]')]
    public string $bicfi;

    /**
     * Гүйлгээний утга
     * Example: MNT
     */
    #[SerializedPath('[CdtTrfTxInf][RmtInf][AddtlRmtInf]')]
    public string $txInfo;
}
