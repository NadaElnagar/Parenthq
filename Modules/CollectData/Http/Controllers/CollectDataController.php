<?php

namespace Modules\CollectData\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CollectData\Http\Service\CollectDateService;
use Modules\CollectData\Http\Service\SearchService;

class CollectDataController extends Controller
{
    protected $data,$search;

    public function __construct()
    {
        $this->data = new CollectDateService();
        $this->search = new SearchService();
    }

    public function index()
    {
        return $this->data->store();
    }

    public function search(Request $request)
    {
        return $this->search->search($request);
    }
}
