<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();

        return view("home", compact("articles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("article.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|string",
            "description" => "required|string",
            "image" => "nullable|image|mimes:jpg,png,jpeg|max:2048",
        ]);

        if ($request->image) {
            $file = $request->file('image');
            $filename = time() . "." . $file->getClientOriginalExtension();
            $file->storeAs('article', $filename, 'public');
        }

        Article::create([
            "title" => $request->title,
            "description" => $request->description,
            "user_id" => Auth::user()->id,
            "image" => $filename ?? null,
        ]);

        return response()->json([
            "message" => "Article created successfully",
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::find($id);

        return view("article.show", compact("article"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::find($id);

        return view("article.edit", compact("article"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "title" => "required|string",
            "description" => "required|string",
        ]);

        $article = Article::find($id);

        $article->update([
            "title" => $request->title,
            "description" => $request->description,
        ]);

        return response()->json([
            "message" => "Article updated successfully",
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);

        $article->delete();

        return response()->json([
            "message" => "Article deleted successfully",
        ], 200);
    }
}
