@extends('layouts.app')
@section('content')
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Пользователи</h5>
    </div>
    <div class="panel-body">
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
          @foreach ($users as $user)
            <tr>
              <td>{{ $user->id }}</td>
              <td><a href="{{ route('users.profile', $user->id)}}">{{$user->name}}</a></td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->created_at }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <a href="{{ route('users.new')}}">Создать пользователя</a>
    </div>
  </div>
@endsection
