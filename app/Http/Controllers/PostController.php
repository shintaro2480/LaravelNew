<?php

namespace App\Http\Controllers;

//Postクラスのuse宣言が入っている
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        //単にpost/create.blade.phpを表示させる
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //requestのvalidateメソッドを使う形で、validateを行う
        $inputs=request()->validate(
            [
                'title'=>'required|max:255',
                'body'=>'required|max:1000',
                'image'=>'image|max:1024'
            ]);
        
        //クラスからインスタンスを作成
        $post = new Post();
        //インスタンスにrequestで飛んできた値を入れ込む
        $post->title = $inputs['title'];
        $post->body = $inputs['body'];
        //user_idに関しては、今ログインしているidをコントローラー側で仕込めば便利
        $post->user_id =auth()->user()->id;
        //データベースに追加してcreateビューに飛ばす
        $post->save();
        return redirect()->route('post.create')->with('message','投稿を作成・保存しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
