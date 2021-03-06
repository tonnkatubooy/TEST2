<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Book;      //この部分は必要 エラーが出た

class BookController extends Controller
{
    public function index()   //インデックスアクションの定義？
    {
        $books = Book::all();   //DBからbookテーブルの値を取得
        
        return view ('book/index', compact('books'));    //取得した値をビュー(book/index)に渡す
    }
    //editアクション
    public function edit($id)
    {
      // DBよりURIパラメータと同じIDを持つBookの情報を取得
        $book = Book::findOrFail($id);

      // 取得した値をビュー「book/edit」に渡す
        return view('book/edit', compact('book'));
    }
    // public function store(BookRequest $request)
    // {
    //     $book = new Book();
    //     $book->name = $request->name;
    //     $book->price = $request->price;
    //     $book->author = $request->author;
    //     $book->save();

    //     return redirect("/book");
    // }
    public function update(BookRequest $request, $id)    //updateアクション
    {
        $book = Book::findOrFail($id);
        $book->name = $request->name;
        $book->price = $request->price;
        $book->author = $request->author;
        $book->save();

        return redirect("/book");
    }
    public function destroy($id)    //destroyアクション
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect("/book");
    }
    public function create()
    {
    // 空の$bookを渡す
    $book = new Book();
        return view('book/create', compact('book'));
    }

    public function store(BookRequest $request)
    {
        $book = new Book();
        $book->name = $request->name;
        $book->price = $request->price;
        $book->author = $request->author;
        $book->save();

        return redirect("/book");
    }
}

