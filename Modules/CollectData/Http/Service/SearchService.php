<?php


namespace Modules\CollectData\Http\Service;


use App\Http\Services\CacheService;
use App\Http\Services\ResponseService;
use Cassandra\Collection;
use Modules\CollectData\Http\Repositroy\SearchRepository;

class SearchService extends ResponseService
{
    protected $search,$cache_service;
    public function __construct()
    {
        $this->search = new SearchRepository();
        $this->cache_service = new CacheService();
    }
   /*Filter in file */
    public function search($request)
    {
        $cache_name = $this->casheName($request);
        if ($result = $this->cache_service->getCasheRedis($cache_name)) {
            return $result;
        } else {
            if ($request->has('provider')) {
                $function_name = 'getFrom' . $request->provider;
                $result = $this->$function_name($request);
            } else {
                $provider_x[] = $this->getFromDataProviderX($request);
                $provider_y[] = $this->getFromDataProviderY($request);
                $result = array_merge($provider_x, $provider_y);
            }
            return $this->cache_service->store_cashe_redis($cache_name, $result);
        }
    }

    private function casheName($request)
    {
        $cache_name = "search";

        if ($request->has('balanceMin')) {
            $cache_name .='_balanceMin';
        }
        if ($request->has('balanceMax')) {
            $cache_name .='_balanceMax';
        }
        if (isset($request->Currency)) {
            $cache_name .='_Currency';
        }
        if (isset($request->statusCode)) {
            $cache_name .='_statusCode';
        }
        return $cache_name;
    }
    /*Get Data From Json File and add filter option*/
    private function getFromDataProviderX($request)
    {
        $url = storage_path('Json/DataProviderX.json');
        $datos = file_get_contents($url);
        $data = json_decode($datos, true);
        $data = $this->filterOptionProviderX($data, $request);
        return $data;
    }

    /*Get Data From Json File  and add filter option*/
    private function getFromDataProviderY($request)
    {
        $url = storage_path('Json/DataProviderY.json');
        $datos = file_get_contents($url);
        $data = json_decode($datos, true);
        $data = $this->filterOptionProviderY($data, $request);
        return $data;
    }

    /*Add Filteration Options To Provider X*/
    private function filterOptionProviderX($data, $request)
    {
        $result = collect($data['users']);
        if ($request->has('balanceMin')) {
            $result = $result->where('parentAmount', '>=', $request->balanceMin);
        }
        if ($request->has('balanceMax')) {
            $result = $result->where('parentAmount', '<=', $request->balanceMax);

        }
        if (isset($request->Currency)) {
            $result = $result->where('Currency', $request->Currency);
        }
        if (isset($request->statusCode)) {
            $result = $result->where('statusCode', $request->statusCode);
        }
        return $result->all();
    }

    /*Add Filteration Options To Provider Y*/
    private function filterOptionProviderY($data, $request)
    {
        $result = collect($data['users']);
        if ($request->has('balanceMin')) {
            $result = $result->where('balance', '>=', $request->balanceMin);
        }
        if ($request->has('balanceMax')) {
            $result = $result->where('balance', '<=', $request->balanceMax);

        }
        if (isset($request->Currency)) {
            $result = $result->where('currency', $request->Currency);
        }
        if (isset($request->statusCode)) {
            $result = $result->where('status', $request->statusCode);
        }
        return $result->all();
    }
}
