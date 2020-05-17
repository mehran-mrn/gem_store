<?php

namespace MkKardgar\BagistoWeblog\Http\Controllers;


use Illuminate\Routing\Controller;

class bagistoWeblogController extends Controller
{
    protected $_config;

    public function __construct()
    {
        $this->_config = request('_config');
    }

    public function index()
    {
        return view($this->_config['view']);

    }

    public function store()
    {
        dd('store');
    }

    public function edit()
    {
        dd('edit');
    }

    public function update()
    {
        dd('update');
    }

}

?>