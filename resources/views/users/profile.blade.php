@extends('layouts.app')
{{-- @php
  dd($user);
@endphp --}}

@section('content')
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Информация о пользователе</h5>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Свойство</th>
            <th>Значение</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Имя: </td>
            <td>{{ $user->name }} </td>
          </tr>
          <tr>
            <td>email: </td>
            <td>{{ $user->email }} </td>
          </tr>
          <tr>
            <td>data: </td>
            <td>{{ $user->created_at }} </td>
          </tr>
          <tr>
            <td>Роли: </td>
            <td>{{ $user->roles }} </td>
          </tr>
          {{-- @foreach ($user->news as $news)
            <tr>
              <td>Новости: </td>
              <td>{{$news->title}}</td>
            </tr>
          @endforeach --}}
            <a href="{{ route('users.newRoles', $user->id)}}">Дать роль</a>
        </tbody>
      </table>
    </form>
    </div>
  </div>
@endsection
