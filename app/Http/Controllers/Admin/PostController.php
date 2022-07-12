<?php

namespace App\Http\Controllers\admin;

use App\Post;

use App\Http\Controllers\Controller;
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
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate( $this->validateRules(), $this->validateMessages() );

        $data = $request->all();

        $new_post = new Post();

        $new_post->fill($data);

        $new_post->save();

        return redirect()->route('admin.posts.show', $new_post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if ($post) {
            return view('admin.posts.edit', compact('post'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $request->validate( $this->validateRules(), $this->validateMessages() );

        $data = $request->all();

        $post->update($data);

        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('prodotto_cancellato', "Il post '$post->title' è stato eliminato correttamente");
    }

    private function validateRules(){
        return [
            'title' => 'required|max:50|min:3',
            'slug' => 'required|max:70|min:10',
            'content' => 'required|max:50|min:3',
        ];
    }

    private function validateMessages(){
        return [

            'title.required' => 'Il titolo è obbligatorio',
            'title.max' => 'Il titolo deve avere al massimo :max caratteri',
            'title.min' => 'Il titolo deve avere minimo :min caratteri',

            'slug.required' => 'Lo Slug è obbligatorio',
            'slug.max' => 'Lo Slug deve avere al massimo :max caratteri',
            'slug.min' => 'Lo Slug deve avere minimo :min caratteri',

            'content.required' => 'Il testo del post è obbligatorio',
            'content.max' => 'Il testo del post deve avere al massimo :max caratteri',
            'content.min' => 'Il testo del post deve avere minimo :min caratteri',

        ];

    }
}
