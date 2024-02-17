<?php

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Lodipay\TdbCorpGwSDK\Dto\BankTransferReqDto;
use Lodipay\TdbCorpGwSDK\TdbCorpGwAPI;

function getTransferDomesticMockHandler()
{
    return new MockHandler([
        new Response(200, [], <<<XML
        <?xml version="1.0" encoding="utf-8"?>
        <Document>
            <GrpHdr>
                <MsgId>87fbf20130425/1</MsgId>
                <CreDtTm>2024-02-03T11:16:58</CreDtTm>
                <TxsCd>1001</TxsCd>
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
            <OrgnlPmtInfAndSts>
                <TxInfAndSts>
                <StsId>0</StsId>
                <Rst>
                <JrNo>405000984778090</JrNo>
                <TxDbRate>1</TxDbRate>
                <TxCrRate>1</TxCrRate>
                </Rst>
                <TxFee>
                <Nm>Банкны гүйлгээний шимтгэл</Nm>
                <Amt>100</Amt>
                <Ccy>MNT</Ccy>
                </TxFee>
                </TxInfAndSts>
            </OrgnlPmtInfAndSts>
        </Document>
        XML),
    ]);
}

function getTransferInterbankMockHandler()
{
    return new MockHandler([
        new Response(200, [], <<<XML
        <?xml version="1.0" encoding="utf-8"?>
        <Document>
            <GrpHdr>    
                <MsgId>87fbf20130425/1</MsgId>
                <CreDtTm>2024-02-03T11:16:58</CreDtTm>
                <TxsCd>1001</TxsCd>
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
            <OrgnlPmtInfAndSts>
                <TxInfAndSts>
                <StsId>0</StsId>
                <Rst>
                <JrNo>405000984778091</JrNo>
                <TxDbRate>1</TxDbRate>
                <TxCrRate>1</TxCrRate>
                </Rst>
                <TxFee>
                <Nm>Банк хоорондын гүйлгээний шимтгэл</Nm>
                <Amt>300</Amt>
                <Ccy>MNT</Ccy>
                </TxFee>
                </TxInfAndSts>
            </OrgnlPmtInfAndSts>
        </Document>
        XML),
    ]);
}

it('should transfer fund to domestic account successfully', function () {
    /** @var TdbCorpGwAPI $service */
    $service = test()->getMockClientAPI([
        'handler' => HandlerStack::create(getTransferDomesticMockHandler()),
    ]);

    $response = $service->bankTransfer(BankTransferReqDto::from([
        'numberOfTxs' => 1,
        'controlSum' => 1000.00,
        'forT' => 'F',
        'debtorName' => 'Баагий',
        'debtorIBAN' => '431007323',
        'debtorCurrency' => 'MNT',
        'instructedAmount' => 1000.00,
        'creditorName' => 'Батаа',
        'creditorIBAN' => '431007374',
        'instructedAmount' => 1000.00,
        'creditorCurrency' => 'MNT',
        'txInfo' => 'Банк доторх гүйлгээ',
    ]));

    expect($response)->response->TxInfAndSts->Rst->JrNo->toBe('405000984778090');
});

it('should transfer fund to interbank account successfully', function () {
    /** @var TdbCorpGwAPI $service */
    $service = test()->getMockClientAPI([
        'handler' => HandlerStack::create(getTransferInterbankMockHandler()),
    ]);

    $response = $service->bankTransfer(BankTransferReqDto::from([
        'numberOfTxs' => 1,
        'controlSum' => 1000.00,
        'forT' => 'F',
        'debtorName' => 'Баагий',
        'debtorIBAN' => '431007323',
        'debtorCurrency' => 'MNT',
        'instructedAmount' => 1000.00,
        'creditorName' => 'Батаа',
        'creditorIBAN' => '5065254433',
        'instructedAmount' => 1000.00,
        'creditorCurrency' => 'MNT',
        'bicfi' => 'TDBM',
        'txInfo' => 'Банк хоорондын гүйлгээ',
    ]));

    expect($response)->response->TxInfAndSts->Rst->JrNo->toBe('405000984778091');
});
