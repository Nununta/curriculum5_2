@extends('layouts.layout')
@section('title', '登録済み予定の一覧')

@section('content')
<div class="container">
  <h2>予定完了一覧</h2>
  <div class="select-menu">
    <ul class="sort">
      <li><a href="{{ action('Admin\TodoController@add') }}" role="button" class="">新規作成</a></li>
    </ul>
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
        @if($todo->priority == 5)
        <tr class="priority-todo">
          @endif
          <td>{{ $todo->id }}</td>
          <td>{{ str_limit($todo->title, 100) }}</td>
          <td>{{ str_limit($todo->space, 250) }}</td>
          <td>
            <div><a class="mod-btn" href="{{ action('Admin\TodoController@incomplete', ['id' => $todo->id]) }}">未完了</a></div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection