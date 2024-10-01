<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotesController;
Route::get('/', [NotesController::class,'show']);

Route::get("/adminadding",[NotesController::class,'edit'])->name('notes.upload');
Route::post('/upload', [NotesController::class, 'upload'])->name('upload');
Route::get("/add",[NotesController::class,'destroy'])->name('notes.upload');
Route::delete('/notes/{id}', [NotesController::class, 'destroy'])->name('notes.destroy');
