@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
  
    <form class="form-inline my-2 my-lg-0 ml-2">
      <div class="form-group">
      <input type="search" class="form-control mr-sm-2" name="search"  value="{{request('search')}}" placeholder="キーワードを入力" aria-label="検索...">
      </div>
      <input type="submit" value="検索" class="btn btn-info">
  </form>
  
    <div class="card-body">
        <div class="card-title">
            検索フォーム
        </div>
        
        <!-- ↓バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- ↑バリデーションエラーの表示に使用-->

       <!-- 本登録フォーム -->
<form action="{{ url('books') }}" method="POST" class="form-horizontal">
        @csrf
        <!-- 本のタイトル -->
        <div class="form-group col-md-6">
            <label for="item_name" class="col-sm-3 control-label">タイトル</label>
            <input type="text" name="item_name" class="form-control" id="item_name" value="{{old('item_name')}}">
        </div>
        <!-- 冊数 -->
        <div class="form-group col-md-6">
            <label for="item_number" class="col-sm-3 control-label">冊数</label>
            <input type="text" name="item_number" class="form-control" id="item_number" value="{{old('item_number')}}">
        </div>
    
        <!-- 本 登録ボタン -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-primary">
                    Save
                </button>
        </div>
    </div>
</form>
    </div>
    <!-- Book: 既に登録されてる本のリスト -->
    <!-- 現在の本 -->
    @if (count($books) > 0)
        <div class="card-body">
            <table class="table table-striped task-table">
                <!-- テーブルヘッダ -->
                <thead>
                    <th>報告書データ</th>
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
    
                            <!-- 本: 削除ボタン -->
                            <td>
                                    <form action="{{ url('book/'.$book->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            削除
                                        </button>
                                    </form>
                            </td>
                       <!-- 本: 更新ボタン -->
                            <td>
                                　<a href="{{ url('booksedit/'.$book->id) }}">
                                      <button type="submit" class="btn btn-primary">更新</button>
                                　</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
    @endsection