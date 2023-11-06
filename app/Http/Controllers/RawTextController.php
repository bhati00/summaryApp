<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Files;
use Illuminate\Support\Facades\Storage;
use App\Services\SpeechToTextService;
use Illuminate\Support\Facades\Http;


class RawTextController extends Controller
{

    protected $speech_to_text_service;

    public function __construct(SpeechToTextService $speech_to_text_service)
    {
        $this->speech_to_text_service = $speech_to_text_service;
    }

    public function index()
    {
        return view('add-raw-text');
    }

    public function store(Request $request)
    {
        $text_extension = ['txt'];
        $my_file = $request->file('raw_file');
        $file_extension = $my_file->getClientOriginalExtension();

        if (in_array($file_extension, $text_extension)) {
            $path = $my_file->store('raw_text_files');           
            if ($path) {
                // saving details in db
                $File = new Files();
                $File->name = $request->file('raw_file')->getClientOriginalName();
                $File->uploaded_at = date('Y-m-d H:i:s');
                $File->path = $path;
                if ($File->save()) {
                    return redirect()->back()->with('status', 'File uploaded successfully!');
                } else {
                    return redirect()->back()->with('error', 'File upload failed.');
                }
            } else {
                return redirect()->back()->with('error', 'File upload failed.');
            }
        }
    }

    public function raw_text_files()
    {
        $File = new Files();
        $files = $File::all();
        $data = array();
        foreach ($files as $file) {
            $view = '<span data-toggle="tooltip" data-placement="top" data-state="primary" title="View File"><a href="' . url('/view-raw-file') . '/' . $file['id'] . '"><button type="button" class="btn btn-outline-primary btn-icon waves-effect waves-light btn-sm"><span class="ri-arrow-right-line m-1"></span></button></a></span>';
            $action = $view;
            $file_name = $file['name'];
            $uploaded_at = $file['uploaded_at'];
            $file_path = $file['path'];
            $file_size = (Storage::fileSize($file_path)/1000).' KB';
            $generate_key_points = '<span data-toggle="tooltip" data-placement="top" data-state="primary" title="Generate key points"><a href="' . url('/generate-key-points') . '/' . $file['id'] . '"><button type="button" class="btn btn-outline-primary" data-mdb-ripple-color="dark">Generate key points</button>
            </a></span>';
            $data[] = array(
                $action,
                $file_name,
                $uploaded_at,
                $file_size,
                $generate_key_points
            );
        }
        $output = array(
            "data" => $data
        );
        $this->output($output);
    }

    public function view_raw_file($file_id): View
    {
        $File = new Files();
        $raw_file = $File::findOrFail($file_id);
        $path = $raw_file->path;        
        $file_content =  Storage::get($path);
        $data = array(
            'result' => $file_content,
            'error' => '',
            'sub_view' => 'view_raw_file',
            'breadcrumbs' => $raw_file['name']
        );
        return view('layout_main', $data);
    }

}
