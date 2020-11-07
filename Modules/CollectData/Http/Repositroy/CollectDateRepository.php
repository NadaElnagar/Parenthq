<?php


namespace Modules\CollectData\Http\Repositroy;


use Modules\CollectData\Entities\ProviderX;
use Modules\CollectData\Entities\ProviderY;

class CollectDateRepository
{

    public function storeDataX($data)
    {
        try {
            foreach ($data as $result){
                 ProviderX::updateOrInsert(['parent_email'=>$result['parentEmail']],
                    ['parent_amount'=>$result['parentAmount'],
                        'currency'=>$result['Currency'],
                        'status_code'=>$result['statusCode'],
                        'registeration_date'=>$result['registerationDate'],
                        'parent_identification'=>$result['parentIdentification']
                    ]);
            }
        } catch (\Exception $ex) {

        }
    }

    public function storeDataY($data)
    {
        try {
            foreach ($data as $result){
                ProviderY::updateOrInsert(['email'=>$result['email']],
                    ['balance'=>$result['balance'],
                        'currency'=>$result['currency'],
                        'status'=>$result['status'],
                        'y_id'=>$result['id'],
                        'y_created_at'=>$result['created_at']
                    ]);
            }
        } catch (\Exception $ex) {

        }
    }
}
