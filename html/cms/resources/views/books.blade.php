<!-- resources/views/books.blade.php -->
@extends('layouts.app')
@section('content')
  <!-- Bootstrapの提携コード -->
  <div class="card-body">
    <div class="card-title">
      本のタイトル
    </div>

    <!-- バリデーションエラーの表示に使用 -->
    @include('common.errors')
    <!-- バリデーションエラーの表示に使用 -->

    <!-- 本登録フォーム -->
    <form action="{{url('books')}}" method="POST" class="form-horizontal">
    @csrf
    
      <!-- 本のタイトル -->
      <div class="form-group">
        <div class="col-sm-6">
          <input type="text" name="item_name" class="form-control">
        </div>
      </div>

      <!-- 本の登録ボタン -->
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-primary">
            Save
          </button>
        </div>
      </div>
    </form>
  </div>
  <!-- Book：すでに登録されている本のリスト -->

@endsection