<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
   public function showForm(Request $request)
  {
    return view('articles.form');
  }

  function uploadArticle(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'title' => "required",
      'email' => "required|email",
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
    ]);
    if ($validator->fails()) {
      return response()->json($validator->errors(), 422);
    }
    $file = $request->file("image")->store("uploads/images");

    //  save image and name in database
    $Article = new Article();
    $Article->title = $request->title;
    $Article->email = $request->email;
    $Article->image = $file;
    $Article->save();
    return response()->json(["status" => true, "message" => "Image uploaded successfully"]);
  }
}