<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()   //インデックスアクションの定義？
    {
        $books = Book::all();   //DBからbookテーブルの値を取得
        
        return view ('book/index', compact('books'));    //取得した値をビュー(book/index)に渡す
    }
    public function edit($id)
    {
        $books = Book::findOrFail($id);

        return view('book/edit', compact('book'));
    }
}
