<?php
namespace Controllers;

use \Core\Controller;

class NotFoundController extends Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = [];

		$this->loadView('404', $data);
	}

}
