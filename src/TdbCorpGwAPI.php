<?php

namespace Lodipay\TdbCorpGwSDK;

use Lodipay\TdbCorpGwSDK\Dto\Client\BalanceReqDocument;
use Lodipay\TdbCorpGwSDK\Dto\Client\BalanceResDocument;
use Lodipay\TdbCorpGwSDK\Dto\GetBalanceReqDto;
use Lodipay\TdbCorpGwSDK\Dto\GetStatementsReqDto;
use Lodipay\TdbCorpGwSDK\Dto\Client\GroupHeaderReq;
use Lodipay\TdbCorpGwSDK\Dto\Client\StatementReqDocument;
use Lodipay\TdbCorpGwSDK\Dto\Client\StatementResDocument;
use Lodipay\TdbCorpGwSDK\Dto\Client\BankTransferReqDocument;
use Lodipay\TdbCorpGwSDK\Dto\BankTransferReqDto;
use Lodipay\TdbCorpGwSDK\Dto\Client\BankTransferResDocument;
use Lodipay\TdbCorpGwSDK\Enum\LangCode;
use Lodipay\TdbCorpGwSDK\Enum\PasswordType;
use Lodipay\TdbCorpGwSDK\Enum\TxnCode;
use Tsetsee\TseGuzzle\TseGuzzle;

class TdbCorpGwAPI extends TseGuzzle
{

    public function __construct(
        private string $organizationCode,
        private int $roleID,
        private string $loginID,
        private string $passwordLogin,
        private string $passwordTransaction,
        array $options = []
    ) {

        parent::__construct(array_replace_recursive([
            'base_uri' => 'http://192.168.1.1:8080',
        ], $options));
    }

    /**
     * @param array<string, mixed> $options
     */
    public function getGroupHeader(TxnCode $txnCode, array $options = []): GroupHeaderReq
    {

        $groupHeader = new GroupHeaderReq();
        $groupHeader->txsCode = $txnCode->value;
        $groupHeader->numberOfTxs = 1;
        $groupHeader->organizationCode = $this->organizationCode;
        $groupHeader->lang = LangCode::MN->value;
        $groupHeader->loginId = $this->loginID;
        $groupHeader->roleId = $this->roleID;
        $groupHeader->loginPassType = PasswordType::LOGIN_PASSWORD->value;
        $groupHeader->loginPass = $this->passwordLogin;
        $groupHeader->txsPassType = PasswordType::TXN_PASSWORD->value;
        $groupHeader->txsPass = $this->passwordTransaction;
        $groupHeader->createDate = '2014-10-21T11:16:58';

        if (isset($options['messageId'])) {
            $groupHeader->messageId = $options['messageId'];
        }

        if (isset($options['numberOfTxs'])) {
            $groupHeader->numberOfTxs = $options['numberOfTxs'];
        }

        if (isset($options['controlSum'])) {
            $groupHeader->controlSum = $options['controlSum'];
        }

        if (isset($options['lang'])) {
            $groupHeader->lang = $options['lang'];
        }
        return $groupHeader;
    }

    /**
     * Get balance of an account
     */
    public function getBalance(GetBalanceReqDto $dto, array $options = []): BalanceResDocument
    {
        $reqDocument = new BalanceReqDocument();
        $reqDocument->header = $this->getGroupHeader(TxnCode::T5003, $options);
        $reqDocument->info = $dto;

        $response = $this->callAPI($reqDocument->serialize('xml', ['xml_root_node_name' => 'Document']));
        return BalanceResDocument::from($response, 'xml');
    }

    /**
     * Get statements
     */
    public function getStatements(GetStatementsReqDto $dto, $options = []): StatementResDocument
    {
        $reqDocument = new StatementReqDocument();
        $reqDocument->header = $this->getGroupHeader(TxnCode::T5004, $options);
        $reqDocument->info = $dto;

        $response = $this->callAPI($reqDocument->serialize('xml', ['xml_root_node_name' => 'Document']));
        return StatementResDocument::from($response, 'xml');
    }

    /**
     * Bank transfer
     * 
     * @return TransferDomesticResDto
     */
    public function bankTransfer(BankTransferReqDto $dto, TxnCode $txnCode, $options = []): BankTransferResDocument
    {
        $reqDocument = new BankTransferReqDocument();
        $reqDocument->header = $this->getGroupHeader($txnCode, $options);
        $reqDocument->info = $dto;

        $response = $this->callAPI($reqDocument->serialize('xml', ['xml_root_node_name' => 'Document']));
        return BankTransferResDocument::from($response, 'xml');
    }

    /**
     * Call API
     * 
     * @param ?string $uri
     * @param array<string, mixed> $options
     * 
     * @return mixed
     */
    private function callAPI($body, array $options = []): mixed
    {
        $clientOptions = array_replace_recursive([
            'headers' => [
                'Content-Type' => 'text/xml; charset=UTF8',
            ],
            'body' => $body
        ]);
        $uri = $options['uri'] ?? '';
        $response = $this->client->post($uri, $clientOptions);
        return $response->getBody();
        return simplexml_load_string($response->getBody(), 'SimpleXMLElement', LIBXML_NOCDATA);
    }
}
