<?php
/**
 * Muleta aos models.
 *
 * @author Webboo! Soluções Web
 *
 * @link https://www.webboo.com.br
 *
*/
namespace Core;

class Model
{

	protected $db;

	public function __construct()
	{
		global $db;
		$this->db = $db;
	}

}
