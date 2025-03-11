<?php

namespace App\Http\Api;

use Illuminate\Routing\Controller;
use App\Models\Dto\ApiResponse;
use App\Models\SiteAcknowledge;
use App\Services\PemanfaatanService;
use App\Services\PerolehanService;


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
        $params = request()->json();

        $data = SiteAcknowledge::get();

        return response()->json(new ApiResponse($data));
    }

    public function update(){
        $params = request()->json();

        // $data = $this->perolehanService->getDetail($params['site_name']);

        return response()->json(new ApiResponse($params));
    }
}
