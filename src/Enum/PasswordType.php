<?php

namespace Lodipay\TdbCorpGwSDK\Enum;

enum PasswordType: int
{

    /**
     * Нэвтрэх нууц үг
     */
    case LOGIN_PASSWORD = 1;

    /**
     * Гүйлгээний нууц үг
     */
    case TXN_PASSWORD = 2;
}
