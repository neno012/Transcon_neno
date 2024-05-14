<?php

use App\Http\Controllers\Transaction\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/project',[TransactionController::class,'index'])->name('project');
Route::post('/project',[TransactionController::class,'store'])->name('project.post');
Route::get('/project/{id}',[TransactionController::class,'edit'])->name('project.edit');
Route::put('/project/{id}',[TransactionController::class,'update'])->name('project.update');
Route::delete('/project/{id}',[TransactionController::class,'destroy'])->name('project.delete');

Route::get('/', function () {
    return view('home',['title' => 'Dashboard']);
});
Route::get('/struktur', function () {
    return view('strukturdata',['title' => 'Structure Data Test']);
});
Route::get('/query', function () {
    return view('query',['title' => 'Query Test']);
});
// Route::get('/project', function () {
//     return view('project',['title' => 'Mini Project']);
// });
// Route::get('/update', function () {
//     return view('update',['title' => 'update']);
// });