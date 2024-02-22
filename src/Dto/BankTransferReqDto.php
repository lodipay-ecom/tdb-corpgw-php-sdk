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
    private int $numberOfTxs;

    /**
     * Гүйлгээний нийлбэр дүн. Валют хамаарахгүй. Ж нь: 500USD, 100EUR гэвэл 600 байна.
     * Example: 1,000
     */
    #[SerializedPath('[CtrlSum]')]
    private ?float $controlSum;

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
    private float $instructedAmount;

    /**
     * Гүйлгээний дүн – илгээгч дансын валютаар
     * Example: MNT
     */
    #[SerializedPath('[CdtTrfTxInf][Amt][EqvtAmt]')]
    private ?float $equivalentAmount;

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

    /**
     * Get the value of numberOfTxs
     *
     * @return int
     */
    public function getNumberOfTxs(): int
    {
        return $this->numberOfTxs;
    }

    /**
     * Set the value of numberOfTxs
     *
     * @param string|int $numberOfTxs
     *
     * @return self
     */
    public function setNumberOfTxs(string|int $numberOfTxs): self
    {
        $this->numberOfTxs = is_string($numberOfTxs) ? (int)$numberOfTxs : $numberOfTxs;
        return $this;
    }

    /**
     * Get the value of controlSum
     *
     * @return ?float
     */
    public function getControlSum(): ?float
    {
        return $this->controlSum;
    }

    /**
     * Set the value of controlSum
     *
     * @param string|float $controlSum
     *
     * @return self
     */
    public function setControlSum(string|float $controlSum): self
    {
        $this->controlSum = is_string($controlSum) ? (float)$controlSum : $controlSum;
        return $this;
    }

    /**
     * Get the value of instructedAmount
     *
     * @return float
     */
    public function getInstructedAmount(): float
    {
        return $this->instructedAmount;
    }

    /**
     * Set the value of instructedAmount
     *
     * @param string|float $instructedAmount
     *
     * @return self
     */
    public function setInstructedAmount(string|float $instructedAmount): self
    {
        $this->instructedAmount = is_string($instructedAmount) ? (float)$instructedAmount : $instructedAmount;
        return $this;
    }

    /**
     * Get the value of equivalentAmount
     *
     * @return ?float
     */
    public function getEquivalentAmount(): ?float
    {
        return $this->equivalentAmount;
    }

    /**
     * Set the value of equivalentAmount
     *
     * @param string|float $equivalentAmount
     *
     * @return self
     */
    public function setEquivalentAmount(string|float $equivalentAmount): self
    {
        $this->equivalentAmount = is_string($equivalentAmount) ? (float)$equivalentAmount : $equivalentAmount;
        return $this;
    }
}
