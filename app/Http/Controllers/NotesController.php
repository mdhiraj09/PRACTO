<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Storage;


class NotesController extends Controller
{
    
   function upload(Request $req){
    $no = new Note();
    $file = $req->file('file');
    $filename = time() . '.' . $file->getClientOriginalExtension();   
    $path = $file->storeAs('upload-public', $filename, 'public');

    $no -> title = $req['title'];
    $no->file_path = $path;
    $no->save();

    $notes = Note::all();
    //    return view('index', compact('notes'));
    return back();
}

function edit(){
    $notes = Note::all();
       return view('upload', compact('notes'));
}
function show(){
    $notes = Note::all();
    return view('index', compact('notes'));
}
public function destroy($id)
{
    // Find the note by ID
    $note = Note::find($id);

    if ($note) {
        // Delete the file from storage
        Storage::delete('public/' . $note->file_path);

        // Delete the note from the database
        $note->delete();

        return redirect()->back()->with('success', 'Note deleted successfully.');
    } else {
        return redirect()->back()->with('error', 'Note not found.');
    }
}


}
