<?php namespace Fideloper\Cache;

// Laravel Cache facade
use Cache;

class LaravelCache implements CacheInterface {

	protected $cachekey;
	protected $minutes;

	public function __construct($cachekey, $minutes=null)
	{
		$this->cachekey = $cachekey;
		$this->minutes = $minutes;
	}

	public function get($key)
	{
		return Cache::section($this->cachekey)->get($key);
	}

	public function put($key, $value, $minutes=null)
	{
		if( is_null($minutes) )
		{
			$minutes = $this->minutes;
		}

		return Cache::section($this->cachekey)->put($key, $value, $minutes);
	}

	public function has($key)
	{
		return Cache::section($this->cachekey)->has($key);
	}

}