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
        <div class="row">
          <div class="col-sm-6">
            Book
            <input type="text" name="item_name" class="form-control">
          </div>          
          <div class="col-sm-6">
            冊数
            <input type="text" name="item_number" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            金額
            <input type="text" name="item_amount" class="form-control">
          </div>          
          <div class="col-sm-6">
            公開日
            <input type="text" name="published" class="form-control" placeholder="年/月/日">
          </div>
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
  <!-- 現在の本 -->
  @if (count($books) > 0)
    <div class="card-body">
      <div class="card-body">
        <table class="table table-striped task-table">
          <!-- テーブルヘッダ -->
          <thead>
            <th>本一覧</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </thead>
          <!-- テーブル本体 -->
          <tbody>
            @foreach ($books as $book)
              <tr>
                <!-- 本タイトル -->
                <td class="table-text">
                  <div>{{ $book->item_name }}</div>
                </td>

                <!-- 本: 更新ボタン -->
                <td>
                  <form action="{{ url('booksedit/'.$book->id) }}" method="POST">
                    @csrf               <!-- CSRFからの保護 -->
                    
                    <button type="submit" class="btn btn-primary">
                        更新
                    </button>
                  </form>
                </td>

                <!-- 本: 削除ボタン -->
                <td>
                  <form action="{{ url('book/'.$book->id) }}" method="POST">
                    @csrf               <!-- CSRFからの保護 -->
                    @method('DELETE')   <!-- 擬似フォームメソッド -->
                    
                    <button type="submit" class="btn btn-danger">
                        削除
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  @endif



@endsection