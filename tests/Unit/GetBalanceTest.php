<?php

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Lodipay\TdbCorpGwSDK\Dto\GetBalanceReqDto;
use Lodipay\TdbCorpGwSDK\TdbCorpGwAPI;

function getBalanceMockHandler()
{
    return new MockHandler([
        new Response(200, [], <<<XML
        <?xml version="1.0" encoding="UTF-8"?>
        <Document>
        <GrpHdr>
            <MsgId>87fbf20130425/1</MsgId>
            <CreDtTm>2014-10-21T11:16:58</CreDtTm>
            <TxsCd>5003</TxsCd>
            <InitgPty>
                <Id>
                    <OrgId>
                        <AnyBIC>19899</AnyBIC>
                    </OrgId>
                </Id>
            </InitgPty>
            <RspCd>10</RspCd>
            <RspDesc>Амжилттай хийгдсэн</RspDesc>
        </GrpHdr>
        <EnqRsp>
            <RptDt>2014-10-30</RptDt>
            <ABal>1050000.00</ABal>
            <Bal>1050000.00</Bal>
        </EnqRsp>
        </Document>
        XML),
    ]);
}

it('should return balance of a user account', function () {
    /** @var TdbCorpGwAPI $service */
    $service = test()->getMockClientAPI([
        'handler' => HandlerStack::create(getBalanceMockHandler()),
    ]);

    $response = $service->getBalance(GetBalanceReqDto::from([
        'accountNo' => '123123123',
        'currency' => 'MNT'
    ]));

    expect($response)->availableBalance->toBe('1050000.00');
});
