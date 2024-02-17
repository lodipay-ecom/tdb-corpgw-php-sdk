<?php

namespace Lodipay\TdbCorpGwSDK\Enum;

enum TxnCode: int
{

    /**
     * Банк доторх шилжүүлэг
     */
    case T1001 = 1001;

    /**
     * Банк хоорондын шилжүүлэг
     */
    case T1002 = 1002;

    /**
     * Үлдэгдэл шалгах
     */
    case T5003 = 5003;

    /**
     * Хуулга авах
     */
    case T5004 = 5004;
}
