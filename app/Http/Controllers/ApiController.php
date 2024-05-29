<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TinhThanh;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    public function importTinhThanhFromApi()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://vapi.vnappmob.com/api/province');

        $data = json_decode($response->getBody(), true);

        // Kiểm tra xem key "results" tồn tại trong dữ liệu trả về
        if(isset($data['results'])){
            $provinces = $data['results'];

            // Lặp qua mỗi tỉnh và thêm vào cơ sở dữ liệu
            foreach ($provinces as $province) {
                // Kiểm tra xem tỉnh đã tồn tại trong cơ sở dữ liệu chưa
                $existingProvince = TinhThanh::where('ten_tinh', $province['province_name'])->first();

                // Nếu tỉnh chưa tồn tại, thêm mới vào cơ sở dữ liệu
                if (!$existingProvince) {
                    TinhThanh::create([
                        'ten_tinh' => $province['province_name']
                    ]);
                }
            }
        }

        return response()->json(['message' => 'Dữ liệu từ API đã được thêm vào bảng tinh_thanh.']);
    }
}
