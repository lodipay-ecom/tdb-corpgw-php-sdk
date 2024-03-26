<?php

namespace Lodipay\TdbCorpGwSDK\Dto;

use Lodipay\DTO\DTO\TseDTO;
use Symfony\Component\Serializer\Attribute\SerializedPath;

class BankTransferResDto extends TseDTO
{
    /**
     * Хариу мессежний дугаар. 0 -гүйлгээ амжилттай хийгдсэн. Бусад тохиолдолд өөр хариу буцна.
     * Example: 0
     */
    #[SerializedPath('[TxInfAndSts][StsId]')]
    public string $statusId;

    /**
     * Хэрэв гүйлгээ амжилттай хийгдсэн бол банкны систем дэх журналын дугаар энд буцаана.
     * Example: 823100019015
     */
    #[SerializedPath('[TxInfAndSts][Rst][JrNo]')]
    public ?string $journalNo;

    /**
     * Гүйлгээ амжилтгүй болсон бол тэр тухай мэдээлэл
     * Example: EB -Txn1
     */
    #[SerializedPath('[TxInfAndSts][Rst][AddtInf]')]
    public ?string $additionalInfo;

    /**
     * Валютын хөрвүүлэгтэй гүйлгээ хийгдсэн бол авах ханш
     * Example: 1
     */
    #[SerializedPath('[TxInfAndSts][Rst][TxDbRate]')]
    public ?float $debitRate;

    /**
     * Валютын хөрвүүлэгтэй гүйлгээ хийгдсэн бол зарах ханш
     * Example: 1
     */
    #[SerializedPath('[TxInfAndSts][Rst][TxCrRate]')]
    public ?float $creditRate;

    /**
     * Гүйлгээ гарсан данс
     * Example: 5065254440
     */
    #[SerializedPath('[TxInfAndSts][Rst][FAcntNo]')]
    public ?string $fromAccountNo;

    /**
     * Гүйлгээ гарсан дансны нэр
     * Example: Lodipay LLC
     */
    #[SerializedPath('[TxInfAndSts][Rst][FAcntName]')]
    public ?string $fromAccountName;

    /**
     * Гүйлгээ гарсан гүйлгээний дүн 
     * Example: 10000
     */
    #[SerializedPath('[TxInfAndSts][Rst][FAmount]')]
    public ?float $fromAmount;

    /**
     * Гүйлгээ орсон данс
     * Example: 5065254455
     */
    #[SerializedPath('[TxInfAndSts][Rst][ToAcntNo]')]
    public ?string $toAccountNo;

    /**
     * Гүйлгээ орсон дансны нэр
     * Example: Badamgarav
     */
    #[SerializedPath('[TxInfAndSts][Rst][ToAcntName]')]
    public ?string $toAccountName;

    /**
     * Гүйлгээ орсон гүйлгээний дүн 
     * Example: 10000
     */
    #[SerializedPath('[TxInfAndSts][Rst][ToAmount]')]
    public ?float $toAmount;

    /**
     * Шимтгэлийн нэр
     * Example: Банк хоорондын гүйлгээний шимтгэл
     */
    #[SerializedPath('[TxInfAndSts][TxFee][Nm]')]
    public ?string $feeName;

    /**
     * Шимтгэлийн дүн
     * Example: 2000
     */
    #[SerializedPath('[TxInfAndSts][TxFee][Amt]')]
    public ?float $feeAmount;

    /**
     * Шимтгэлийн валют
     * Example: MNT
     */
    #[SerializedPath('[TxInfAndSts][TxFee][Ccy]')]
    public ?string $feeCurrency;
}
