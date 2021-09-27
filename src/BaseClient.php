<?php

namespace Onetoweb\Acumulus;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\RequestOptions;
use Spatie\ArrayToXml\ArrayToXml;

/**
 * Base Client.
 * 
 * @author Jonathan van 't Ende <jvantende@onetoweb.nl>
 * @copyright Onetoweb B.V.
 */
class BaseClient
{
    // base uri
    const BASE_URI = 'https://api.sielsystems.nl/';
    
    /**
     * @var int
     */
    private $contractCode;
    
    /**
     * @var string
     */
    private $username;
    
    /**
     * @var string
     */
    private $password;
    
    /**
     * @var bool
     */
    private $testMode;
    
    /**
     * @var string
     */
    private $emailOnError;
    
    /**
     * @var string
     */
    private $emailOnWarning;
    
    /**
     * @param int $contractCode
     * @param string $username
     * @param string $password
     * @param bool $testMode = false
     * @param string $emailOnError = null
     * @param string $emailOnWarning = null
     */
    public function __construct(int $contractCode, string $username, string $password, bool $testMode = false, string $emailOnError = null, string $emailOnWarning = null)
    {
        $this->contractCode = $contractCode;
        $this->username = $username;
        $this->password = $password;
        $this->testMode = $testMode;
        $this->emailOnError = $emailOnError;
        $this->emailOnWarning = $emailOnWarning;
    }
    
    /**
     * @param array $data = []
     * 
     * @return string
     */
    private function createXML(array $data = []): string
    {
        // build xml array
        $baseArray = [
            'contract' => [
                'contractcode' => $this->contractCode,
                'username' => $this->username,
                'password' => $this->password,
                'emailonerror' => $this->emailOnError,
                'emailonwarning' => $this->emailOnWarning
            ],
            'format' => 'json',
            'testmode' => $this->testMode,
        ];
        
        // add data to base array
        $xmlArray = array_merge($baseArray, $data);
        
        // convert array to xml string
        $xmlString = ArrayToXml::convert($xmlArray, ['rootElementName' => 'myxml'], true, 'UTF-8');
        
        return $xmlString;
    }
    
    /**
     * @param string $endpoint
     * @param array $data = []
     * @param array $query = []
     */
    public function request(string $endpoint, array $data = [], array $query = [])
    {
        // setup client
        $guzzleClient = new GuzzleClient([
            'base_uri' => self::BASE_URI,
            'http_errors' => false,
        ]);
        
        // build request options
        $options = [
            RequestOptions::QUERY => $query,
        ];
        
        // add xml string to form
        $options[RequestOptions::FORM_PARAMS] = [
            'xmlstring' => $this->createXML($data)
        ];
        
        // make request
        $result = $guzzleClient->request('POST', $endpoint, $options);
        
        // json decode contents
        $contents = json_decode($result->getBody()->getContents(), true, 512, JSON_BIGINT_AS_STRING);
        
        // return contents
        return $contents;
    }
}