<?php

namespace Lodipay\TdbCorpGwSDK\Enum;

enum BankCode: string
{
        // Монголбанк
    case BOMUMNUB = '010000';
        // Ариг банк
    case ARGBMNUB = '210000';
        // Богд банк
    case BOGDMNUB = '380000';
        // Голомт банк
    case GLMTMNUB = '150000';
        // Капитрон банк
    case CPITMNUB = '300000';
        // М банк
    case MBNKMNUB = '390000';
        // Төрийн банк
    case STBMMNUB = '340000';
        // Тээвэр хөгжлийн банк
    case TRDMMNUB = '190000';
        // Үндэсний хөрөнгө оруулалтын банк
    case NAIMMNUB = '290000';
        // Хаан банк
    case AGMOMNUB = '050000';
        // Хас банк
    case CAXBMNUB = '320000';
        // Хөгжлийн банк
    case DEVBMNUB = '360000';
        // Худалдаа хөгжлийн банк
    case TDBMMNUB = '040000';
        // Чингис хаан банк
    case CHKHMNUB = '330000';
        // Капитал банк ЭХА
    case INEHMNUB = '030000';
        // Хадгаламж банк ЭХА
    case SVEHMNUB = '180000';
        // Сангийн яам (Төрийн сан)
    case MOFUMNUB = '900000';
        // Үнэт цаасны төвлөрсөн хадгаламжийн төв
    case CSDMMNUB = '950000';
        // Монголын үнэт цаасны клирингийн төв
    case SSCHMNUB = '940000';
        // 360 Файнанс ББСБ
    case THSFMNUB = '560000';
        // Ард кредит ББСБ
    case ARDBMNUB = '520000';
        // Дата бэйнк
    case DTBKMNUB = '550000';
        // Инвескор Хэтэвч ББСБ
    case INVPMNUB = '530000';
        // Мобифинанс ББСБ
    case MOBIMNUB = '500000';
        // Нэткапитал Финанс Корпораци ББСБ
    case NCFGMNUB = '540000';
        // Хай пэймэнт солюшнс
    case HPSMMNUB = '510000';
}
