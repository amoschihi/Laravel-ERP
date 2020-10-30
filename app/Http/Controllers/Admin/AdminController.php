<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Notifications\Notify;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    /**
    * 
    *
    * 
    */
    public function __construct () 
    {
    	$this->middleware('auth:admin');
    }
    public function showContactForm () 
    {
    	return view('admin.contactform');
    }
    public function showAboutForm () 
    {
    	return view('admin.about');
    }
    public function showComments($id='')
    {
        $admins = Admin::where('id','<>',Auth::id())->get();
        $users = User::where('id','<>',Auth::id())->get();
        if($id)
        {
            $comments = Comment::where('comment_id',$id)->get();
        }
        else 
        {
            $comments = Comment::all(); 
        }
        return view('admin.comment',compact('admins','users','comments'));
    }
    public function fetchComments(Request $request)
    {
        if($request->view != '') 
        {
            Comment::where('status',0)
                    ->update(['status'=>1]);
        }
        $comments = Comment::all();
        $output = '';
        if(@count($comments) > 0)
        {
            foreach ($comments as $key => $comment) {
                $output .= '
                <li>
                <a href="'.route('admin.comment',$comment->comment_id).'">
                <div>
                <strong>'.Auth::user()->name.'</strong>
                <span class="pull-right text-muted">
                <em>'.$comment->created_at->diffForHumans().'</em>
                </span>
                </div>
                <div>'.$comment->subject.'</div>
                </a>
                </li>';
            }
            $output .= '
            <li class="divider"></li>
            <li>
            <a class="text-center" href="'.url('admin/comments').'">
            <strong>Read All Messages</strong>
            <i class="fa fa-angle-right"></i>
            </a>
            </li>';
        }
        else
        {
            $output .= '
            <li>
            <a class="text-center" href="#">
            <strong>No Messages Found</strong>
            </a>
            </li>';
        }

        $unseen_comments = Comment::where('status',0)->get();
        $count = $unseen_comments->count();
        $data = array(
            'unseen_notifications'=>$count,
            'notifications'=>$output
        );
        return response($data);

    }
    public function insertComment(Request $request)
    {
        if($request->user_id == NULL && $request->admin_id != NULL) {
            $comment = Comment::create($request->all());
            Admin::find($comment->admin_id)->notify(new Notify($comment));
        }elseif($request->admin_id == NULL && $request->user_id != NULL) {
            $comment = Comment::create($request->all());
            User::find($comment->user_id)->notify(new Notify($comment));
        }elseif($request->admin_id != NULL && $request->user_id != NULL) {
            $comment = Comment::create($request->all());
            Admin::find($comment->admin_id)->notify(new Notify($comment));
            User::find($comment->user_id)->notify(new Notify($comment));
        }else{
            return response()->json(['message'=>'No recipient found']);
        }
        return response($comment);
    }
}
