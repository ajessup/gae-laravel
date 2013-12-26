<?php namespace Ajessup\GaeLaravel;

use \Illuminate\Foundation\Application;

class GaeApplication extends \Illuminate\Foundation\Application {

	public function bindInstallPaths(array $paths)
	{
	    if (realpath($paths['app'])) {
	        $this->instance('path', realpath($paths['app']));
	    }
	    elseif (file_exists($paths['app'])) {
	        $this->instance('path', $paths['app']);
	    }
	    else {
	        $this->instance('path', FALSE);
	    }

	    foreach (array_except($paths, array('app')) as $key => $value)
	    {
	        if (realpath($value)) {
	            $this->instance("path.{$key}", realpath($value));
	        }
	        elseif (file_exists($value)) {
	            $this->instance("path.{$key}", $value);
	        }
	        else {
	            $this->instance("path.{$key}", FALSE);
	        }
	    }
	}

}