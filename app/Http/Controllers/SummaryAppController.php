<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Files;
use Illuminate\Support\Facades\Storage;
use App\Services\SummaryService;
use Illuminate\Support\Arr;
use OpenAI;


class SummaryAppController extends Controller
{
    protected $summaryService;

    public function __construct(SummaryService $summaryService)
    {
        $this->summaryService = $summaryService;
    }
    //
    public function index(): View
    {
        $data = array(
            'sub_view' => 'dashboard',
            'breadcrumbs' => 'Generate Key Points'
        );
        return view('layout_main',$data);
    }

    // 
    public function generate_key_points($file_id): View
    {
        $File = new Files();
        $raw_file = $File::findOrFail($file_id);
        $path = $raw_file->path;        
        $file_content =  Storage::get($path);
        $summary = $this->summaryService->summaryText($file_content);    
        $data = array(
            'result' => $summary['result'],
            'error' => $summary['error'],
            'sub_view' => 'show_key_points',
            'breadcrumbs' => 'Key Points'
        );
        return view('layout_main', $data);
    }
}
