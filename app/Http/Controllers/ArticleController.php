<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Validator;

class ArticleController extends Controller
{
    function show(){
       return view('list');
    }
    // public function index()
    // {
    //     $items = ['item1', 'item2', 'item3'];

    //     return view('list', ['items' => $items]);
    // }
    public function index()
    {
        $articles = Article::all();
        return view('list', compact('articles'));
    }
    

    public function addArticle(){
        return view('add');
    }

    // public function store(Request $request){
    //  dd($request->all());
    // }

    public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'descriptions' => 'required',
        'author' => 'required|max:255',
    ]);

    // Create a new article
    $article = new Article;
    $article->title = $validatedData['title'];
    $article->descriptions = $validatedData['descriptions'];
    $article->author = $validatedData['author'];
    $article->save();

    // Redirect to the article index page with a success message
    return redirect()->route('articles.index')->with('success', 'Article added successfully.');
}

// public function deleteArticle($id)
//     {
//         $article = Article::find($id);

//         if (!$article) {
//             return response()->json(['message' => 'Article not found.'], 404);
//         }

//         $article->delete();

//         return response()->json(['message' => 'Article deleted successfully.']);
//     }

// public function deleteArticle($id)
//     {
//         $article = Article::find($id);

//         if (!$article) {
//             return response()->json(['message' => 'Article not found.'], 404);
//         }

//         $article->delete();

//         return response()->json(['message' => 'Article deleted successfully.']);
//     }

//     public function confirmDelete($id)
//     {
//         return view('delete', compact('id'));
//     }


    // public function deleteArticle($id)
    // {
    //     $article = Article::find($id);
    
    //     if (!$article) {
    //         return response()->json(['message' => 'Article not found.'], 404);
    //     }
    
    //     if (!$article->delete()) {
    //         return response()->json(['message' => 'Error deleting article.'], 500);
    //     }
    
    //     return response()->json(['message' => 'Article deleted successfully.']);
    // }

    public function deleteArticle($id)
{
    $article = Article::find($id);
    if($article){
        $article->delete();
        return response()->json(['success' => 'Article deleted successfully.']);
    }else{
        return response()->json(['error' => 'Article not found.']);
    }
}

public function editArticle($id)
{
    $article = Article::find($id);

    if (!$article) {
        return redirect()->back()->with('error', 'Article not found.');
    }

    return view('edit', ['article' => $article]);
}

// public function editArticle($id)
// {
//     $article = Article::find($id);

//     if (!$article) {
//         return redirect()->back()->with('error', 'Article not found.');
//     }

//     if (Session::has('errorMsg')) {
//         $errorMsg = Session::get('errorMsg');
//     } else {
//         $errorMsg = null;
//     }

//     return view('edit', ['article' => $article, 'errorMsg' => $errorMsg]);
// }




public function updateArticle(Request $request, $id)
{
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'descriptions' => 'required',
        'author' => 'required|max:255'
    ]);

    $article = Article::find($id);
    if (!$article) {
        return redirect('/articles')->with('error', 'Article not found.');
    }

    $article->title = $validatedData['title'];
    $article->descriptions = $validatedData['descriptions'];
    $article->author = $validatedData['author'];
    $article->save();

    return redirect('/articles')->with('success', 'Article updated successfully.');
}



// public function editArticle(Request $request, $id)
// {
//     $article = Article::find($id);
//     $article->title = $request->input('title');
//     $article->descriptions = $request->input('descriptions');
//     $article->author = $request->input('author');
//     $article->save();
//     return redirect('/articles')->with('success', 'Article updated successfully.');
// }


// public function editArticle(Request $request, $id)
// {
//     $validatedData = $request->validate([
//         'title' => 'required|max:255',
//         'descriptions' => 'required',
//         'author' => 'required|max:255',
//     ]);

//     $article = Article::find($id);
//     $article->title = $request->input('title');
//     $article->descriptions = $request->input('descriptions');
//     $article->author = $request->input('author');
//     $article->save();
//     return redirect('/articles')->with('success', 'Article updated successfully.');
// }

// public function editArticle($id)
// {
//     $article = Article::find($id);
//     return view('edit', ['article' => $article]);
// }




    


}

