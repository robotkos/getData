<?php
/**
 * Created by PhpStorm.
 * User: serhii
 * Date: 23.01.19
 * Time: 20:39
 */
namespace Parser;

use Dotenv\Dotenv;

class DataScraperController
{
    const FILE_RESULT = "";
    const ENV_FILE = '.env';

    public function __construct()
    {
        $this->addEnvParameters();
    }

    public function start (){
        $guzzleClient = $this->getGuzzleClient();
        $response = $guzzleClient->get('https://search.ipaustralia.gov.au/trademarks/search/advanced');
        dump($response->getBody()->getContents());
        die();
    }

    private function getGuzzleClient(){
        return new \GuzzleHttp\Client(
            [
                'timeout' => 0,
                'headers' => [
                    'User-Agent' => 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:50.0) Gecko/20100101 Firefox/50.0',
                    'Connection' => 'keep-alive',
                    'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
                    'Upgrade-Insecure-Requests' => '1',
                ],
                'proxy' => PROXY,
                'cookies' => TRUE,
                'expect' => FALSE,
                'http_errors' => TRUE,
                'debug' => FALSE,
                'allow_redirects' => true,
//                'on_stats' => function (\GuzzleHttp\TransferStats $stats) use (&$urlProd) {
//                    $urlProd = $stats->getEffectiveUri()->getPath();
//                }
            ]
        );
    }
    private function addEnvParameters(){
        $dotenv = Dotenv::create(__DIR__ . '/../', self::ENV_FILE);
        $dotenv->load();
        $envArray = $dotenv->load();

        foreach ($envArray as $key => $item) {
            define($key, $item);
        }
    }
}