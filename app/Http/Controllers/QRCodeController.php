<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class QRCodeController extends Controller
{
    public function generateQRCode($token)
{
    $data = [
        'token' => $token,
    ];
    $path = storage_path('app/public/qrcodes/'.$token.'.png'); // Đường dẫn lưu trữ mã QR
    QrCode::format('png')->size(200)->generate(json_encode($data), $path);

    return $path;
}
}
