<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\user;
use App\Services\Operations;
use Illuminate\Http\Request;


class MainController extends Controller
{
    public function index(){
        //load users notes
        $id = session('user.id');
        $notes = user::find($id)->notes()
                            ->whereNull('deleted_at')->get()->toArray();


        //show home view
        return view('home', ['notes' => $notes]);
    }

    public function newNote(){
        //show new note view

        return view('new_note');
    }

    public function newNoteSubmit(Request $request){
        // Validate request
        $request->validate(
            [
                'title' => ['required', 'min:3', 'max:200'],
                'content' => ['required', 'min:3', 'max:3000'],
            ],

            [
                'title.required' => 'O titulo e obrigatorio',
                'title.min' => 'O titulo deve ter no minimo :min caracteres',
                'title.max' => 'O titulo deve ter no maximo :max caracteres',

                'content.required' => 'A descricao e obrigatoria',
                'content.min' => 'A descricao deve ter no minimo :min caracteres',
                'content.max' => 'A descricao deve ter no maximo :max caracteres'
            ],
            );
        //get user id
            $id = session('user.id');


        // create a new note
            $note = new Note();
            $note->user_id = $id;
            $note->title = $request->title;
            $note->text = $request->content;
            $note->save();

        // redirect to home

        return redirect()->route('home');
    }

    public function editNote($id){
        $id = Operations::decryptId($id);
        if ($id  === null){
            return redirect()->route('home');
        }
        // load view
        $note = Note::find($id);


        // show edit note view
        return view('edit_note', ['note' => $note]);
    }

    public function editNoteSubmit(Request $request){
        //validate request
        $request->validate(
            [
                'title' => ['required', 'min:3', 'max:200'],
                'content' => ['required', 'min:3', 'max:3000'],
            ],

            [
                'title.required' => 'O titulo e obrigatorio',
                'title.min' => 'O titulo deve ter no minimo :min caracteres',
                'title.max' => 'O titulo deve ter no maximo :max caracteres',

                'content.required' => 'A descricao e obrigatoria',
                'content.min' => 'A descricao deve ter no minimo :min caracteres',
                'content.max' => 'A descricao deve ter no maximo :max caracteres'
            ],
            );


        // Check if note_id exits
        if ($request->note_id == null){
            return redirect()->to('home');
        }

        // decrypt note_id
        $id = Operations::decryptId($request->note_id);
        if ($id  === null){
            return redirect()->route('home');
        }
        // load note
        $note = Note::find($id);

        // update note
        $note->title = $request->title;
        $note->text = $request->content;
        $note->save();
        // redirect to home
        return redirect()->route('home');
    }


    public function deleteNote($id){
        $id = Operations::decryptId($id);
        if ($id  === null){
            return redirect()->route('home');
        }
        // load note

        $note = Note::find($id);

        //show delete note confimation

        return view('delete_note', ['note' => $note]);
    }

    public function deleteNoteConfirm($id){
        // check if id is encrypt
            $id = Operations::decryptId($id);
            if ($id  === null){
                return redirect()->route('home');
            }
        // load note
            $note = Note::find($id);
        // 1. hard delte
            // $note->delete();
        // 2 soft delete
            // $note->deleted_at = date('Y:m:d H:i:s');
            // $note->save();
        // Soft delete in model

        $note->delete();

        //force delete in model

        // $note->forceDelete();

        // return to home
        return redirect()->route('home');
    }
}
