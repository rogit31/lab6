<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index()
    {
        $results = DB::select('select * from articles');
        return json_encode($results, JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $article = new Article;
        $article->title = $request->input('title');
        $article->url = $request->input('url');
        $article->save();

        return response()->json([
            'message' => 'Created successfully.'
        ], 201);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->url = $request->input('url');
        $article->save();

        return response()->json([
            'message' => 'Updated.',
            json_encode($article, JSON_PRETTY_PRINT)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $article = Article::find($id);
        $article->delete();
        $count = Article::count();


        return response()->json([
            'message'=> 'Deleted.',
            'count' => $count
        ],201);
    }
}
