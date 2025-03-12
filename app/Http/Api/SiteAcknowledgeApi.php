<?php

namespace App\Http\Api;

use Illuminate\Routing\Controller;
use App\Models\Dto\ApiResponse;
use App\Models\SiteAcknowledge;
use App\Services\PemanfaatanService;
use App\Services\PerolehanService;
use Exception;
use Illuminate\Support\Facades\DB;

class SiteAcknowledgeApi extends Controller
{
    function __construct()
    {
        // parent::__construct();
    }

    public function index()
    {
    }

    public function list(){
        $data = SiteAcknowledge::get();

        return response()->json(new ApiResponse($data));
    }

    public function get(){
        $params = request()->json()->all();

        $data = SiteAcknowledge::where('site_name', $params['site_name'])->first();

        return response()->json(new ApiResponse($data));
    }

    public function update(){
        $params = request()->json()->all();

        $params = json_decode(json_encode($params));

        try{
            DB::transaction(function () use($params) {
                foreach($params as $ack){
                    $data = SiteAcknowledge::where('site_name', $ack->site_name)->first();

                    if(empty($data)){
                        $data = new SiteAcknowledge();
                        $data->site_name = $ack->site_name;
                    }

                    $data->fill(json_decode(json_encode($ack), true));

                    $data->save();
                }
            }, 3);
        }catch(Exception $e){
            throw $e;
        }

        return response()->json(new ApiResponse($params));
    }
}
