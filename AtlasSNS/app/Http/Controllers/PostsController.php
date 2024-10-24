<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Auth;

class PostsController extends Controller
{
    //
    public function index(){
        $posts = Post::with('user')->orderBy('created_at', 'desc')->get(); //投稿内容を新しい順に取得
        return view('posts.index', compact('posts')); //compact関数=変数名とその値から配列を作成
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->post = $request->input('post'); //postカラムにviewから送られてきたデータを格納
        $post->user_id = auth()->user()->id;  //user_idカラムに、投稿した認証済みのユーザーのIDを格納
        $post->save();  //データベースに投稿を保存

        return redirect('/top');  //投稿処理後、トップページにリダイレクト
    }

    public function update(Request $request)
    {
        $validator = $request->validate([
            'upPost' => 'required|min:1|max:150',
        ]);
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        Post::where('id', $id)->update([
            'post' => $up_post
        ]);
        return redirect('/top');
    }

    public function delete($id)
    {
        Post::where('id', $id)->delete();//where句で一致する投稿を検索
        return back();
    }
}
