<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;

class UploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $files = File::allFiles(public_path() . '/uploads');
        return View::make('upload.index', ['files' => $files]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function upload() {
        if (Input::hasFile('file')) {

            $file = Input::file('file');
            $file->move('uploads', $file->getClientOriginalName());

            // redirect
            Session::flash('message', 'Файл успешно загружен');
            return Redirect::to('upload');
        }

}
}
