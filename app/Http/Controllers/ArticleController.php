<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function showArticle($category){
        $articles = Article::where('category_id', $category)->get();

        return view('guest.article', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.tambah_artikel');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        $rules = [
            'title' => 'required|min:5|max:250',
            'category' => 'required|integer',
            'photo' => 'required|mimes:jpg, png, jpeg',
            'news' => 'required|min:10|max:250'
        ];

        $messages = [
            'required' => ':attribute must be filled',
            'num' => ':attribute must be in number',
            'mimes' => 'file must be in .jpeg, .png, .jpeg',
            'min' => ':attribute must be min :min characters',
            'max' => ':attribute must be max :max characters',
            // 'title.min' => ':attribute must be in :min characters',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator)->with('danger', "Pastikan telah terisi dengan benar");
        }else{
            $user = Auth::user()->id;
    
            $fileLampiran = $request->file('photo');
            $namaFileLampiran = time().".".$fileLampiran->getClientOriginalExtension();
    
            $pathFileLampiran = Storage::disk('public')->putFileAs('fileLampiran', $fileLampiran, $namaFileLampiran);
    
            $article = Article::create([
                'user_id' => Auth::user()->id,
                'category_id' => $request->category,
                'title' => $request->title,
                'description' => $request->news,
                'image' => $namaFileLampiran,
            ]);
    
            return redirect()->route('user.show', compact('user'))->with('success', 'Artikel baru telah ditambahkan');
        }
        
        // dd($article);

    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        // dd($article);

        $detail = Article::join('users', 'users.id', '=', 'articles.user_id')
                    ->select(['articles.*', 'users.name as kontributor'])
                    ->where('articles.id', $article->id)
                    ->first();

        // dd($detail);

        return view('guest.article_detail', compact('detail'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $user = $article->user_id;

        $article->delete();

        return redirect()->route('user.show', compact('user'));
    }
}
