@extends('layouts.app')
@section('content')
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Пользователи</h5>
    </div>
    <div class="panel-body">
      Таблица
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Имя</th>
            <th>Email</th>
            <th>Время регистрации</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $key => $users)
            <tr>
              <td>{{$users->id}}</td>
              <td><a href="{{ route('users.profile', $users->id)}}">{{$users->name}}</a></td>
              <td>{{$users->email}}</td>
              <td>{{$users->created_at}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
          <a href="{{ route('users.newUser')}}">Создать пользователя</a>
    </div>
  </div>
@endsection
