<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('posts.index', ['posts' => $posts]);
        // 포스트테이블에 있는 정보를 모두 가져옴
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, ['made'=>'required', 
         'carname'=>'required',
         ]);

        $fileName = null;
        if($request->hasFile('image')) {
        $fileName = time().'_'.
        $request->file('image')->getClientOriginalName();
        $path = $request->file('image')  
            ->storeAs('public/images', $fileName);
        }                       

        $input = array_merge($request->all(), 
            ["user_id"=>Auth::user()->id]);
        if($fileName) {
        $input = array_merge($input, ['image' => $fileName]);
        }


        Post::create($input);
        return redirect()->route('posts.index')->with('success', 'ture');
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
        return view('posts.show', ['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('posts.edit',['post'=>Post::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, ['made'=> 'required',
        // 'carname'=>'required']);

        $post = Post::find($id);
        $post->made = $request->made;
        $post->carname = $request->carname;
        $post->makeyear = $request-> makeyear;
        $post->price = $request-> price;
        $post->carmodel = $request-> carmodel;
        $post->appearance = $request-> appearance;
        

        //$post->title = $request->title;
        //$post->content = $request->content;

        
        if($request->image) {
            if($post->image) {
                Storage::delete('public/images/'.$post->image);
            }
            $fileName = time().'_'.
                $request->file('image')->getClientOriginalName();
                $post->image = $fileName;
                $request->image->storeAs('public/images', $fileName);
        }
        $post->save();

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        
        $post = Post::find($id);
        //게시글에 딸린 이미지가 있으면 파일시스템에서도 삭제해줘야함
        if($post->image) {
            Storage::delete('public/images/'.$post->image); 
        }
        
        $post->delete();

        return redirect()->route('posts.index');
    }

    public function deleteImage($id) {
        $post = Post::find($id);
        // dd($post);
        Storage::delete('public/images', $post->image);
        $post->image = null;
        $post->save();

        return redirect()->route('posts.edit', ['post'=>$post->id]);
    }
}
