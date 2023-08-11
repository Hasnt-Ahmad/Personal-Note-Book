<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Tag;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    //
    public function addNote(){
        $tag=Tag::find(request("tag_name"));
        if($tag!=null) {
            $note=new Note();
            $note->user_id=session("user_id");
            $note->title=request("title");
            $note->content=request("content");
            $note->tag_id=$tag->id;
            $note->save();
            session(["noteAdded"=>"true"]);
            return redirect("/home");
        }
        else{
            $tag=new Tag();
            $tag->tag_name=request("tag_name");
            $tag->save();
            $tag=Tag::find(request("tag_name"));
            $note=new Note();
            $note->user_id=session("user_id");
            $note->title=request("title");
            $note->content=request("content");
            $note->tag_id=$tag->id;
            $note->save();
            session(["noteAdded"=>"true"]);
            return redirect("/home");     
        }
    }

    public function displayNote(){


        if(request("search")){
            $notes = Note::select('notes.id as note_id', 'notes.*')
            ->where('title', 'like', '%' . request("search") . '%')
            ->orWhere('content', 'like', '%' . request("search") . '%')
            ->with('tag')
            ->get();
            $groupedNotes = $notes->groupBy('tag.name');
            session(["results"=>"true"]);
            return view("home",['note'=>$notes]);
        }

        $notes=Note::join("users", "notes.user_id", "=", "users.id")
        ->join("tags", "tags.id", "=", "notes.tag_id")->select("users.*","notes.id as note_id","notes.*","tags.*")
        ->get();
        $notesByTag = [];

        foreach ($notes as $note) {
            $tag_name = $note['tag_name'];

            if (!isset($notesByTag[$tag_name])) {
            $notesByTag[$tag_name] = [];
            }

            $notesByTag[$tag_name][] = $note;
        }
            return view("home",['note'=>$notesByTag]);
    }

    public function editNote($id){
        $note=Note::find($id);
        return view("update",["note"=>$note]);
    }
    public function updateNote($id){
        $note=Note::find($id);
        $note->title=request("title");
        $note->content=request("content");
        $note->save();
        session(["noteUpdated"=>"true"]);
        return redirect("/home");
    }
    public function deleteNote($id){
        $note=Note::find($id);
        $note->delete();
        session(["noteDeleted"=>"true"]);
        return redirect("/home");
    }

    public function searchNoteByTag($name){
            $tag=Tag::find($name);
            $tags=Tag::all();
            $note=Note::where("tag_id",$tag->id)->get();
            return view("filteredNote",["notes"=>$note ,"tag"=>$tag,"tags"=>$tags]);
    }
    

}
