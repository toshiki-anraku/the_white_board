<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Home;

class HomeController extends Controller
{
    public function user()
    {
       try {
            $selectTable = DB::conection::(config('const.THE_WHITE_BOARD_DB_CONN'))

                ->table("user"),
                ->select('name')
                ->get();
       }

       return
        // } catch(\Exception $e){
        //     $result = [
        //         'result' => false,
        //         'error' => [
        //             'messages' => [$e->getMessage()]
        //         ],
        //     ];
//             return $this->resConversionJson($result, $e->getCode());
//         }
//         return $this->resConversionJson($result);
//     }

//     private function resConversionJson($result, $statusCode=200)
//     {
//         if(empty($statusCode) || $statusCode < 100 || $statusCode >= 600){
//             $statusCode = 500;
//         }
//         return response()->json($result, $statusCode, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
//     }
// }


