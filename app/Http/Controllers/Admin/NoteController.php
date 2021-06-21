<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\Admin\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Exception;
use App\Models\Note;
use Session;
use View;
use Log;
use Auth;
use DB;

class NoteController extends AdminController
{
     /**
    * Store note
    * @param  \Illuminate\Http\Request 
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
        $this->validate($request,[
            'note' => 'required|max:200',
        ]);
        try {
            $note =  $this->Note;
            $note->discription = $request->note;
            $note->user_id = Auth::id();
            $note->save();

            return [
                'status' => true,
            ];

        } catch (Exception $e) {
            log::debug($e);
            abort(500);
        }
    }

    /**
    * delete note
    * @param  \Illuminate\Http\Request 
    * @return \Illuminate\Http\Response
    */
    public function delete($id){

        $noteId = decrypt($id);
        try {
            $note = $this->Note->find($noteId);
            $note->delete();

            return [
                'status' => true,
                'message' => 'Successfully deleted note'
            ];
        } catch (Exception $e) {
            return [
                'status' => false,
                'message' => 'Please try again later'
            ];
        }
    }

    /**
    * Get note list
    * @param  \Illuminate\Http\Request 
    * @return \Illuminate\Http\Response
    */
    public function getAllNotes(Request $request){
        if ($request->ajax()) {

            $notes = $this->Note->whereUserId(Auth::id())->get();

            return response()->json([
                View::make('admin.home.note_data', compact('notes'))->render()
            ]);
        }
        return view('admin.home.dashboard');
    }

    /**
    * Get note data using id
    * @param  \Illuminate\Http\Request 
    * @return \Illuminate\Http\Response
    */
    public function editNoteData(Request $request) {
        try {
            $noteId = decrypt($request->note_id);
        } catch (Exception $exception) {
            return 'false';
        }
        $noteData = $this->Note->whereId($noteId)->first();
        return json_encode($noteData);
    }
   /**
    * Update note
    * @param  \Illuminate\Http\Request 
    * @return \Illuminate\Http\Response
    */
    public function updateNote(Request $request) {

        try {
            $noteId = decrypt($request->note_id);

        } catch (Exception $exception) {
            log::debug($exception);
            return [
                'success' => false,
                'message' => 'Invalid Note Id'
            ];
        }
        try {
            $note = $this->Note->whereId($noteId)->first();
            $note->is_checked = $request->is_checked;
            if ($note->save()) {
                return [
                    'success' => true,
                    'message' => 'Successfully updated note',
                    'data' =>  json_encode($note)
                ];
            }

        } catch (Exception $exception) {
            log::debug($exception);
            return [
                'success' => false,
                'message' => 'Internal server error'
            ];
        }
    }
}
