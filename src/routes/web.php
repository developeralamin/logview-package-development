<?php 

use Alamin\Logviewer\Http\Controllers\LogViewerController;

//add routes
Route::get('/log-views',[LogViewerController::class,'logViewer']);
Route::post('/clear-logs', [LogViewerController::class, 'clearLogs'])->name('clear.logs');