<?php
/**
 *
 * Methods for requesting movie information
 */
namespace RottenTomatoe\Api;

class Movies extends Base 
{
    /**
     * @var int $_id
     */
    protected $_id;
    /**
     * @var string $_path
     */
    protected $_path = array('movies');
    
    /**
     *
     * Get an ID for a single movie
     *
     * @param string $title
     *
     * @return string
     */
    public function id($title)
    {
        if (null !== $title) {
            $result = $this->search(array(
                'q' => urlencode($title),
                'page_limit' => 1
            ));
            $decoded = json_decode($result);
            if (isset($decoded->movies[0]->id)) {
                $this->_id = $decoded->movies[0]->id;
                return $this;
            } else {
                throw new \RunTimeException(sprintf(
                    "No movie was found matching title [%s]", $title
                ));
            }
        }
    }
    
    /**
     *
     * Search for multiple movies
     *
     * @param array $opts
     *
     * @return string
     */
    public function search(array $opts = array())
    {
        return $this->_request($this->_path(), $opts);
    }
    
    /**
     *
     * Get reviews for a specific movie
     *
     * @param array $opts
     *
     * @return string
     */
    public function getReviews(array $opts = array())
    {
        return $this->_request($this->_path('reviews'), $opts);    
    }
    
    /**
     *
     * Get cast for specific movie
     *
     * @param array $opts
     *
     * @return string
     */
    public function getCast(array $opts = array())
    {
        return $this->_request($this->_path('cast'), $opts); 
    }
    
    /** 
     *
     * Find similar movies
     *
     * @param array $opts
     *
     * @retrun string
     */
    public function findSimilar(array $opts = array())
    {
        return $this->_request($this->_path('similar'), $opts);
    }
    
    /**
     *
     * Get movie clips for a specific movie
     *
     * @param array $opts
     *
     * @return string
     */
    public function getClips(array $opts = array())
    {
        return $this->_request($this->_path('clips'), $opts);
    }
    
    /** 
     *
     * Create path for HTTP request
     *
     * @param string $path
     *
     * @return string   
     */
    protected function _path($path = null)
    {
        if (isset($this->_id)) {
            $this->_path[] = $this->_id;
        }
        if ($path) {
            $this->_path[] = $path;
        }
        $fullPath = implode('/', $this->_path);
        return (string) $fullPath . '.json?';
    } 
}