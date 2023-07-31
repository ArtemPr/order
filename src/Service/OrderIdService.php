<?php

namespace App\Service;

use App\DTO\RequestDTOInterface;

class OrderIdService
{
    private array $tcToken;

    public function __construct()
    {
        $this->tcToken = [
            1 => [
                'name' => 'АНО ДПО "СЗ АДПО"',
                'token' => 'jdkljsldkfjlskdjflksjoehrwo4902uewdsuio'
            ],
            2 => [
                'name' => 'АНО ДПО "ВГАППССС"',
                'token' => 'sfsfsddfc3s323fsq3rsdstfdxcza45tygrsea4'
            ],
            3 => [
                'name' => 'АНО ДПО "УрИПКиП"',
                'token' => 'bc43DFGedsjf8io4jenwdfscolgnwersfoifdng'
            ],
            4 => [
                'name' => 'АНО "НИИДПО"',
                'token' => 'dhhh897430e8touhdfgueotgiunbdbsh4roti3p'
            ],
            5 => [
                'name' => 'МЦДО ООО "Бакалавр-Магистр"',
                'token' => 'jk56trhh65&%4yehU76TRTyU76435ewwerhY643'
            ],
            13 => [
                'name' => 'АНО ДПО "МИПК"',
                'token' => 'kjljhJHKYUKJty5663regfhfhgv45eryrthetgt'
            ],
            15 => [
                'name' => 'АНО ДПО "ИППвСС"',
                'token' => 'jk65rhtrfgERtrgdffc%eytrg456634refgrt44'
            ],
            16 => [
                'name' => 'ОСЭК',
                'token' => 'bncmni7GGfgdfbcvdfdBuyuh9hiuyguytyhi9HJH'
            ],
            18 => [
                'name' => 'АНПОО "НСПК"',
                'token' => 'bncsdfsdjhhgythghtUBuhfcvgfewrgtdfdsr3e3'
            ],
            19 => [
                'name' => 'АНО ДПО "ПсихПед"',
                'token' => 'bncmni7GGewtyfdew325tweyer643ertf34weteyr'
            ],
            20 => [
                'name' => 'ООО "МАДП "Пентаскул"',
                'token' => 'hgjui5htkerhjjfogijlyj5treifodghgjgo40uro'
            ],
            22 => [
                'name' => 'АНО ДПО "НАРХСИ"',
                'token' => '478uyrhtkejh9g34ierkytiyu34herkt98iu43hh4hk'
            ],
            191 => [
                'name' => 'МШПУ ООО "Бакалавр-Магистр"',
                'token' => 'iuutr848iuotreiooERT#$RFG4tdft4redfyhg4wetg'
            ],
        ];

    }

    public function getOrderId($param): int
    {
        $orderNumMicroservice = 'https://mdixteem8ct1fb2i9xw2pj7yudcbv4.ru/get_num';


        return 3242231;
    }
}