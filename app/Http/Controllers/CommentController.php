<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use TCG\Voyager\Models\User;
use Illuminate\Support\Facades\Auth;




class CommentController extends Controller
{

    public function index(Request $id){
        $comment = Comment::where('page_id',$id->id)->get();
        foreach($comment as $iteam){
            $iteam['user'] = User::select('name','avatar')->findOrFail($iteam['user_id']);
        }
        return $comment;
    }
    public function store(Request $comment){
        if(!Auth::check()){
            return [
                'error'=>"Nie jesteś zalogowany"
            ];
        }
        return Comment::create([
            'user_id' => Auth::id(),
            'page_id' => $comment->page,
            'comment' => $comment->body,
        ]);
    }
}
