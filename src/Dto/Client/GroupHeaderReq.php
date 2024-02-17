<?php

namespace Lodipay\TdbCorpGwSDK\Dto\Client;

use Symfony\Component\Serializer\Attribute\SerializedPath;

class GroupHeaderReq extends GroupHeaderBase
{
    /**
     * Хэл
     * Example: 0
     */
    #[SerializedPath('[Crdtl][Lang]')]
    public int $lang;

    /**
     * Логин ID
     * Example: testuser
     */
    #[SerializedPath('[Crdtl][LoginID]')]
    public string $loginId;

    /**
     * Эрхийн бүлгийн дугаар
     * Example: 3
     */
    #[SerializedPath('[Crdtl][RoleID]')]
    public int $roleId;

    /**
     * Нэвтрэх нууц үгийн төрөл
     * Example: 1
     */
    #[SerializedPath('[Crdtl][Pwds][PwdType][0]')]
    public int $loginPassType;

    /**
     * Нэвтрэх нууц үг
     * Example: test123
     */
    #[SerializedPath('[Crdtl][Pwds][Pwd][0]')]
    public ?string $loginPass = null;

    /**
     * Гүйлгээний нэвтрэх нэр
     * Example: test
     */
    #[SerializedPath('[Crdtl][Pwds][PwdType][1]')]
    public int $txsPassType;

    /**
     * Гүйлгээний нууц үг
     * Example: test123
     */
    #[SerializedPath('[Crdtl][Pwds][Pwd][1]')]
    public ?string $txsPass = null;
}
