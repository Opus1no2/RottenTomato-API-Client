<?php
/**
 *
 * Performs HTTP request to Rotten Tomatoe API
 */
namespace RottenTomatoe\HttpClient;

class Request
{
    /**
     * @var array $_options
     */
    protected $_options = array(
        'base' => 'http://api.rottentomatoes.com',
        'path' => 'api/public/v1.0'
    );
    
    const USERAGENT = 'RottenTomatoe-PHP-Client';
    
    /**
     *
     * Class constructor
     *
     * @param string $key
     *
     * @return void
     */
    public function __construct($key)
    {
        $this->_key = (string)$key;
    }
    
    /**
     *
     * Http Request
     *
     * @param string $path
     * @param array $opts
     *
     * @return void
     */
    public function _request($path, array $opts = array())
    {   
        $ch = curl_init($this->getUrl($path, $opts));
        curl_setopt($curl, CURLOPT_USERAGENT, self::USERAGENT;
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        $result = curl_exec($ch);
        curl_close($ch);
        
        return $this->_processResult($result);
    }
    
    /**
     *
     * Process JSON response
     *
     * @param string $result
     *
     * @return string
     *
     * @throws RunTimeException
     */
    protected function _processResult($result)
    {   
        $decode = json_decode($result);

        if (isset($decode->error)) {
            throw new \RunTimeException(
                "No valid result was found based on request"
            );
        } else {
            return trim($result);
        }
    }
    
    /**
     *
     * Create Url for Http Request
     *
     * @param string $path
     * @param array $opts
     *
     * @return string
     */
    public function getUrl($path, array $opts)
    {
        $this->_options[] = $path;
        $opts['apikey'] = $this->_key;

        $base = implode('/', $this->_options);
        $return = $base . http_build_query($opts);
        return (string) $return;
    }
}