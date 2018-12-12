@extends('layouts.app')
@section('content')
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Права</h5>
    </div>
    <div class="panel-body">
      Таблица
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Название</th>
            <th>Дисплей Нейм</th>
            <th>Время добавления</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($permissions as $key => $permissions)
            <tr>
              <td>{{$permissions->id}}</td>
              <td><a href="{{ route('permissions.profile', $permissions->id)}}">{{$permissions->name}}</a></td>
              <td>{{$permissions->display_name}}</td>
              <td>{{$permissions->created_at}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
          <a href="{{ route('permissions.new')}}">Добавить право</a>
    </div>
  </div>
@endsection
