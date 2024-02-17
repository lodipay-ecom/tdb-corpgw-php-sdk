<?php

namespace Lodipay\TdbCorpGwSDK\Dto\Client;

use Symfony\Component\Serializer\Attribute\SerializedPath;

class GroupHeaderRes extends GroupHeaderBase
{
    /**
     * Хүсэлтийн хариу мэдээлэл
     * Example: 10
     */
    #[SerializedPath('[RspCd]')]
    public int $responseCode;

    /**
     * Хариу дэлгэрэнгүй тайлбар. Хэрэв алдаа гараад хийгдэж чадаагүй бол алдааны тухай мэдээлэл энд байрлана.
     * Example: Bad request
     */
    #[SerializedPath('[RspDesc]')]
    public ?string $responseDesc;
}
