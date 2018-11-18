@extends('layouts.app')
@section('content')
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Роли</h5>
    </div>
    <div class="panel-body">
      Таблица
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Название</th>
            <th>Время добавления</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($roles as $key => $roles)
            <tr>
              <td>{{$roles->id}}</td>
              <td>{{$roles->name}}</td>
              <td>{{$roles->created_at}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
          <a href="{{ route('roles.newRole')}}">Добавить роль</a>
    </div>
  </div>
@endsection
