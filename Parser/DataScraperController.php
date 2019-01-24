<?php
/**
 * Created by PhpStorm.
 * User: serhii
 * Date: 23.01.19
 * Time: 20:39
 */

namespace Parser;

use Dotenv\Dotenv;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Util\StringUtil;

class DataScraperController
{
    const FILE_RESULT = "";
    const ENV_FILE = '.env';

    public function __construct()
    {
        $this->addEnvParameters();
    }

    public function start($arg)
    {
        $guzzleClient = $this->getGuzzleClient();
        $CSRF = $this->getCSRF('https://search.ipaustralia.gov.au/trademarks/search/advanced', $guzzleClient);
        $postParameters = $this->getPostSearchParameters($CSRF, $arg);
        $response = $guzzleClient->post('https://search.ipaustralia.gov.au/trademarks/search/doSearch', ['form_params' => $postParameters]);
        $data = $this->getDataFromResponse($response->getBody()->getContents());
        dump($data);
        die();
    }

    private function getDataFromResponse($html)
    {
        $crawler = new Crawler($html);
        $array = [];
        $crawler->filter('#resultsTable tr')
            ->each(function (Crawler $trData) use (&$array){
                if ($trData->filter('.trademark.words')->count()){
                    dump(StringUtil::removeNl($trData->filter('.trademark.words')->text()));
                }
            });
        die();
    }

    private function getPostSearchParameters($csrf, $arg): array
    {
        return [
            '_csrf' => $csrf,
            'wv[0]' => $arg,
            'wt[0]' => 'PART',
            'weOp[0]' => 'AND',
            'wv[1]' => '',
            'wt[1]' => 'PART',
            'wrOp' => 'AND',
            'wv[2]' => '',
            'wt[2]' => 'PART',
            'weOp[1]' => 'AND',
            'wv[3]' => '',
            'wt[3]' => 'PART',
            'iv[0]' => '',
            'it[0]' => 'PART',
            'ieOp[0]' => 'AND',
            'iv[1]' => '',
            'it[1]' => 'PART',
            'irOp' => 'AND',
            'iv[2]' => '',
            'it[2]' => 'PART',
            'ieOp[1]' => 'AND',
            'iv[3]' => '',
            'it[3]' => 'PART',
            'wp' => '',
            '_sw' => 'on',
            'classList' => '',
            'ct' => 'A',
            'status' => '',
            'dateType' => 'LODGEMENT_DATE',
            'fromDate' => '',
            'toDate' => '',
            'ia' => '',
            'gsd' => '',
            'endo' => '',
            'nameField[0]' => 'OWNER',
            'name[0]' => '',
            'attorney' => '',
            'oAcn' => '',
            'idList' => '',
            'ir' => '',
            'publicationFromDate' => '',
            'publicationToDate' => '',
            'i' => '',
            'c' => '',
            'originalSegment' => ''
        ];
    }

    private function getCSRF($url, Client $guzzleClient): string
    {
        $response = $guzzleClient->get($url);
        return $this->between('name\=\"\_csrf\" value\=\"', '\"', $response->getBody()->getContents())[0];
    }

    private function getGuzzleClient():Client
    {
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

    private function addEnvParameters()
    {
        $dotenv = Dotenv::create(__DIR__ . '/../', self::ENV_FILE);
        $dotenv->load();
        $envArray = $dotenv->load();

        foreach ($envArray as $key => $item) {
            define($key, $item);
        }
    }


    private function between($start, $end, $content):array
    {

        preg_match_all('~' . $start . '(.*?)' . $end . '~is', $content, $result);

        return $result[1];

    }
}