<?php

use Lodipay\TdbCorpGwSDK\TdbCorpGwAPI;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/../.env.example');

if (file_exists(__DIR__ . '/../.env')) {
    $dotenv->load(__DIR__ . '/../.env');
}


function getMockClientAPI(array $options = []): TdbCorpGwAPI
{
    $logger = null;
    if ('true' === $_ENV['DEBUG']) {
        $logger = new Logger('test');
        $logger->pushHandler(new StreamHandler(STDOUT, Logger::DEBUG));
    }

    $mock = Mockery::mock(TdbCorpGwAPI::class)->makePartial();

    $mock->__construct(
        organizationCode: '123',
        roleID: 1,
        loginID: 'test',
        passwordLogin: '123',
        passwordTransaction: '123',
        options: array_replace_recursive([
            'logger' => $logger,
        ], $options),
    );

    return $mock;
}
