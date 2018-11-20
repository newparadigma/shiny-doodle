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
            <td>Дата создания: </td>
            <td>{{ $user->created_at }} </td>
          </tr>
          <tr>
            <td>Роли: </td>
            <td>
              @if ($user->roles->count() > 0)
                <ul>
                  @foreach ($user->roles as $role)
                    <li>{{ $role->name }}</li>
                  @endforeach
                </ul>
              @else
                Нет
              @endif
            </td>
          </tr>
        </tbody>
      </table>
    </form>
    <a href="{{ route('users.edit', $user->id) }}">Редактировать</a>
    </div>
  </div>
@endsection
