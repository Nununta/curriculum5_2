@extends('layouts.layout')
@section('title', '登録済み予定の一覧')

@section('content')
<div class="container">
  <h2>期限切れ予定一覧</h2>

  <div>
    <div>
      <form action="{{ action('Admin\TodoController@search_dead_list') }}" method="post">
        <div>
          <div class="search-box">
            <div class="search">
              <span>タイトル</span>
              <input type="text" name="cond_title">
              {{ csrf_field() }}
              <input type="submit" class="search-btn" value="検索">
            </div>
            <ul class="sort">
              <li><a href="{{ action('Admin\TodoController@add') }}" role="button" class="">新規作成</a></li>
            </ul>
          </div>
        </div>
      </form>
    </div>
  </div>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>タイトル</th>
          <th colspan="2">本文</th>
        </tr>
      </thead>
      <tbody>
        @foreach($posts as $todo)
        <tr>
          <td>{{ $todo->id }}</td>
          <td>{{ str_limit($todo->title, 100) }}</td>
          <td>{{ str_limit($todo->space, 250) }}</td>
          <td>
            <div>
              <a class="mod-btn" href="{{ action('Admin\TodoController@incomplete', ['id' => $todo->id]) }}">未完了</a>
            </div>
            <div>
                <a href="{{ action('Admin\TodoController@delete', ['id' => $todo->id]) }}">削除</a>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection