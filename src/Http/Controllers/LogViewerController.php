<?php

namespace Alamin\Logviewer\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Request;
class LogViewerController extends Controller
{
    /**
     * Summary of logViewer
     * @return 
     * Show the existing Application logs data
     */
    public function logViewer()
    {
        $filePath = config('logviewer.log_path');

        if (!File::exists($filePath)) {
            return view('logviewer::logs-view')->with('logContent','Log file not found.');
        }

        $logContent = File::get($filePath);

        return view('logviewer::logs-view',compact('logContent'));
    }

    /**
     * Clear the Summary of logViewer
     * @return 
     * 
     */
    public function clearLogs(Request $request)
    {
        $logPath = config('logviewer.log_path');

        if (File::exists($logPath)) {
            // Clear the contents of the log file
            File::put($logPath, '');
            return response()->json(['success' => true, 'message' => 'Logs cleared']);
        }

        return response()->json(['success' => false, 'message' => 'Log file not found']);

    }

}
