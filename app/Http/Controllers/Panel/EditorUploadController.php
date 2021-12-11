<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditorUploadController extends Controller
{
    public function upload(Request $request)
    {
        $file = $request->file('upload');
        $file_name = $file->getClientOriginalName();
        $file->storeAs('articles/images',$file_name,'public_files');

        $function = $request->CKEditorFuncNum;
        $url = asset('articles/images/' . $file_name);
        return response("<script>window.parent.CKEDITOR.tools.callFunction({$function},'{$url}','فایل با موفقیت آپلود شد')</script>");
    }
}
