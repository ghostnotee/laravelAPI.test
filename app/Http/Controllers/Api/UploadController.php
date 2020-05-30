<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadRequest;

class UploadController extends Controller
{
    public function upload(UploadRequest $request)
    {
        if ($request->file('uploadFile')->isValid()) {
            $file = $request->file('uploadFile');
            $path = $request->uploadFile->path();
            $extension = $request->uploadFile->extension();
            $fileNameWithExtension = $file->getClientOriginalName();
            $fileNameWithExtension = $request->userId . '-' . time() . '.' . $extension;

            //store komutu ile laravel kendisi unique bir dosya ismi üretir. biz sotoreAs kullanıp kendimiz belirttik.
            //storegeAs için public diskini kullanabilmek için artisan storage:link ile klasör bağlantısı oluşturuldu.
            $path = $request->uploadFile->storeAs('uploads/images', $fileNameWithExtension, 'public');

            return response()->json(['url' => asset('storage/' . $path)]);
        }
    }
}
