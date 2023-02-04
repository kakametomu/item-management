@extends('adminlte::page')

@section('title', 'ユーザー管理')

@section('content_header')
<h1>ユーザー管理</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ユーザー管理</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        {{-- <div class="input-group-append">
                            <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>名前</th>
                            <th>メールアドレス</th>
                            <th>削除</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><a href="/USerDelete/{{$user->id}}" class="btn btn-default">削除</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop