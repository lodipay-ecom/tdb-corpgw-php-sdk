<?php

namespace Lodipay\TdbCorpGwSDK\Dto\Client;

use Symfony\Component\Serializer\Attribute\SerializedPath;
use Tsetsee\DTO\DTO\TseDTO;

class GroupHeaderBase extends TseDTO
{

    /** 
     * Хүсэлтийн трэйс дугаар. Санхүүгийн гүйлгээний хүсэлтийн хариуг хүлээн авч чадаагүй тохиолдолд ижил трэйсдугаараар хүсэлтээ дахин шийдэж болно. Санхүүгийн бус гүйлгээний хүсэлтийг ижил трэйс дугаартайгаар дахин шидэж болохгүй!
     * Example: 87fbf20130425
     */
    #[SerializedPath('[MsgId]')]
    public string $messageId;

    /**
     * Мессежийг үүсгэсэн огноо. Цаг минут секундтэй. UTC time format (YYYY-MM-DDThh:mm:ss.sssZ)
     * Example: 
     */
    #[SerializedPath('[CreDtTm]')]
    public string $createDate;

    /**
     * Тухайн хүсэлтийг илэрхийлэх гүйлгээний код (TxnCode)
     * Example: 1001
     */
    #[SerializedPath('[TxsCd]')]
    public int $txsCode;

    /**
     * Хүсэлт доторх гүйлгээний тоо ширхэг. Багц гүйлгээ бол багцын тоо.
     * Example: 1
     */
    #[SerializedPath('[NbOfTxs]')]
    public int $numberOfTxs;

    /**
     * Санхүүгийн гүйлгээний хүсэлт бол бүгд гүйлгээний нийлбэр дүн. Валют хамаарахгүй. Ж/нь: 500USD, 100EUR гэвэл 600 байна. Багц гүйлгээ бол бүх багцуудын нийлбэр дүн.
     * Example: 1000
     */
    #[SerializedPath('[CtrlSum]')]
    public ?float $controlSum;

    /**
     * Байгууллагын код. Банкнаас давтагдахгүй дугаарлалт гаргаж өгнө.
     * Example: 19899
     */
    #[SerializedPath('[InitgPty][Id][OrgId][AnyBIC]')]
    public string $organizationCode;
}
