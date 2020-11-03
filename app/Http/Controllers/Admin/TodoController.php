<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Todo;

class TodoController extends Controller
{
    public function add()
    {
        return view('todo.create');
    }
    public function create(Request $request)
    {
            // Varidationを行う
    $this->validate($request, Todo::$rules);
    $todo = new Todo;
    $form = $request->all();

    // フォームから送信されてきた_tokenを削除する
    unset($form['_token']);
    $todo->fill($form);
    $todo->is_complete = 0;
    
    // データベースに保存する

    $todo->save();
    return redirect('admin/todo/');

    // // todo/createにリダイレクトする
    // return redirect('todo/create');
    }  

    public function index(Request $request) {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $todos = Todo::where('title', $cond_title)->get();
        } else {
            // それ以外はすべて取得する
            $todos = Todo::all();
        }
        return view('todo.index', ['todos' => $todos, 'cond_title' => $cond_title]);
        }

        

}
