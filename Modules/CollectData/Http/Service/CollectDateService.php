<?php


namespace Modules\CollectData\Http\Service;


use App\Http\Services\ResponseService;
use Modules\CollectData\Http\Repositroy\CollectDateRepository;

class CollectDateService extends ResponseService
{
    protected $data;

    public function __construct()
    {
        $this->data = new CollectDateRepository();
    }

    public function store()
    {
        $this->CollectDataX();
        $this->CollectDataY();
        return $this->responseWithSuccess(true);
    }

    private function CollectDataX()
    {
        $url = storage_path('Json/DataProviderX.json');
        $datos = file_get_contents($url);
        $data = json_decode($datos, true);
        return $this->data->storeDataX($data['users']);
    }

    private function CollectDataY()
    {
        $url = storage_path('Json/DataProviderY.json');
        $datos = file_get_contents($url);
        $data = json_decode($datos, true);
        return $this->data->storeDataY($data['users']);
    }
}
