<?php

namespace storage;

use function classes\name;
use function serialization\is_serialized;

class flatfile
{
	private $file = '';
	protected $elements = [ ];

	public function __construct ( )
	{
		$name = str_replace ( 'flatfile', '', name ( $this ) );
		$this->file = storage_path ( ) . '/' . $name . '.data';
		$this->elements = $this->unpack ( );
	}

	public function __destruct ( )
	{
		file_put_contents ( $this->file, serialize ( $this->elements ) );
	}

	private function unpack ( ) : array
	{
		if ( $this->needsReset ( ) )
			$this->reset ( );

		return unserialize ( file_get_contents ( $this->file ) );
	}

	private function reset ( )
	{
		file_put_contents ( $this->file, serialize ( [ ] ) );
	}

	private function needsReset ( ) : bool
	{
		if ( ! file_exists ( $this->file ) )
			return true;
		if ( ! is_serialized ( file_get_contents ( $this->file ) ) )
			return true;
		return false;
	}
}