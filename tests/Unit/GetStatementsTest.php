<?php

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Lodipay\TdbCorpGwSDK\Dto\GetStatementsReqDto;
use Lodipay\TdbCorpGwSDK\TdbCorpGwAPI;

function getStatementsMockHandler()
{
    return new MockHandler([
        new Response(200, [], <<<XML
        <?xml version="1.0" encoding="utf-8"?>
        <Document>
            <GrpHdr>
                <MsgId>2234234233123</MsgId>
                <CreDtTm>2/3/2024 11:16:52 AM</CreDtTm>
                <TxsCd>5004</TxsCd>
                <InitgPty>
                    <Id>
                        <OrgId>
                            <AnyBIC>10</AnyBIC>
                        </OrgId>
                    </Id>
                </InitgPty>
                <RspCd>10</RspCd>
                <RspDesc>Амжилттай хийгдсэн</RspDesc>
            </GrpHdr>
            <EnqRsp>
                <Ntry>
                    <NtryRef>776000013510</NtryRef>
                    <Amt>-3000001</Amt>
                    <TxRt>1</TxRt>
                    <TxDt>2021-03-31</TxDt>
                    <TxTime>18:24</TxTime>
                    <TxPostDate>4/2/2024 6:24:40 PM</TxPostDate>
                    <CtAcct>4884961170000001</CtAcct>
                    <TxAddInf>EB -3000K1 : 400-(400012007-ТЕСТ ТЕСТЛ)-&amp;gt; 010000-Төв
                    Монголбанк(5021534104-test)</TxAddInf>
                    <CtAcntOrg>5021534104</CtAcntOrg>
                    <CtBankNo>10000</CtBankNo>
                    <CtActnName>test</CtActnName>
                </Ntry>
                <Ntry>
                    <NtryRef>776000013510</NtryRef>
                    <Amt>-400</Amt>
                    <TxRt>1</TxRt>
                    <TxDt>2021-03-31</TxDt>
                    <TxTime>18:24</TxTime>
                    <TxPostDate>4/2/2024 6:24:40 PM</TxPostDate>
                    <CtAcct>470802</CtAcct>
                    <TxAddInf>EB-БАНК ХООРОНД ШИЛЖҮҮЛГИЙН ШИМТГЭЛ 3.3</TxAddInf>
                    <CtAcntOrg>5021534104</CtAcntOrg>
                    <CtBankNo>4</CtBankNo>
                    <CtActnName/>
                </Ntry>
            </EnqRsp>
        </Document>
        XML),
    ]);
}

it('should return statements of a user account', function () {
    /** @var TdbCorpGwAPI $service */
    $service = test()->getMockClientAPI([
        'handler' => HandlerStack::create(getStatementsMockHandler()),
    ]);

    $response = $service->getStatements(GetStatementsReqDto::from([
        'accountNo' => '123123123',
        'currency' => 'MNT',
        'fromDate' => '2024-01-30',
        'toDate' => '2024-02-30'
    ]));

    expect($response)->toHaveCount(2);
});
