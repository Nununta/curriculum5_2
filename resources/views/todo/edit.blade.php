@extends('layouts.layout')
@section('title', '予定の編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>予定編集</h2>
                <form action="{{ action('Admin\TodoController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ $todo_form->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="space">場所</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="space" value="{{ $todo_form->space }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="deadline">期限</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="deadline" value="{{ $todo_form->deadline }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="priority">重要度</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="priority" value="{{ $todo_form->priority }}">
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $todo_form->id }}">
                    {{ csrf_field() }}
                    <input type="submit" class="update-btn" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection