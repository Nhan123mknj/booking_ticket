<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CKEditorController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('upload')) {
            // Lấy tệp ảnh từ request
            $image = $request->file('upload');

            // Tạo tên mới cho tệp ảnh
            $fileName = time() . '_' . $image->getClientOriginalName();

            // Đường dẫn để lưu trữ tệp ảnh
            $path = public_path('media/' . $fileName);

            // Resize ảnh với chiều rộng tối đa là 800 và chiều cao tự động tính theo tỷ lệ
            Image::make($image)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path);

            // Tạo URL cho ảnh đã tải lên
            $url = asset('media/' . $fileName);

            return response()->json([
                'fileName' => $fileName,
                'uploaded' => 1,
                'url' => $url
            ]);
        }
    }
}
