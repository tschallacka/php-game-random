<?php
namespace Tschallacka\Random;

/**
 * A random class to return predictable randoms when provided with a seed
 * without affecting the state of other random elements.
 * Only use in games, where cryptographically secure randoms are not 
 * needed.
 * @author Tschallacka
 */
class Random {
    
    protected $seed;
    /**
     * Provide a seed, or leave empty for a random seed.
     * @param $seed number The seed to seed with
     */
    public function __construct($seed = 0) 
    {
        if(!$seed) {
            $seed = mt_rand();
        }
        $this->seed = $seed;
        $this->seedWith($seed);
    }
    
    /**
     * Returns the seed this random was seeded with.
     * @return number
     */
    public function getSeed() 
    {
        return $this->seed;
    }
    
    /**
     * The prime used for figuring out the next random number
     */ 
    protected $prime = 2796203;
    
    /**
     * Random seed used when generating the next random number
     * Changes upon every iteration
     * @var integer
     */
    private $RSeed = 0;
    
    /**
     * Set seed, keep private to preserve state.
     * @param number $seed
     */
    private function seedWith($seed = 0) 
    {
        $this->RSeed = abs(intval($seed)) % $this->prime + 1;
        $this->nextInt();
    }
    
    /**
     * Returns a random number between $min and $max
     * defaults between 0 and PHP_INT_MAX
     * @param number $min
     * @param number $max
     */
    public function nextInt($min = 0, $max = PHP_INT_MAX) 
    {
        $this->RSeed = ($this->RSeed * 125) % $this->prime; 
        
        return $this->RSeed % ($max - $min + 1) + $min;
        
    }
    
}
    