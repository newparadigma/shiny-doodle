@extends('layouts.app')
@section('content')
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Информация о роли</h5>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Свойство</th>
            <th>Значение</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Название: </td>
            <td>{{ $roles->name }} </td>
          </tr>
          <tr>
            <td>Дата создания: </td>
            <td>{{ $roles->created_at }} </td>
          </tr>
          <tr>
            <td>Права: </td>
            <td>
              @if ($roles->permissions->count() > 0)
                <ul>
                  @foreach ($roles->permissions as $permissions)
                    <li>{{ $permissions->name }}</li>
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
    <a href="{{ route('roles.edit', $roles->id) }}">Редактировать</a>
    <form class="form-horizontal" action="{{ route('roles.delete', $roles->id) }}" method="post">
      @csrf
      <button type="submit" class="btn btn-primary">
        Удалить
        <i class="icon-arrow-right14 position-right"></i>
      </button>
    </form>
    </div>
  </div>
@endsection
