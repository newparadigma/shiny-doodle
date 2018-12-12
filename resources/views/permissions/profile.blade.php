@extends('layouts.app')
@section('content')
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Информация о правах</h5>
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
            <td>{{ $permissions->name }} </td>
          </tr>
          <tr>
            <td>Дисплей нейм: </td>
            <td>{{ $permissions->display_name }} </td>
          </tr>
          <tr>
            <td>Дата создания: </td>
            <td>{{ $permissions->created_at }} </td>
          </tr>
          <tr>
            <td>Роли: </td>
            <td>
              @if ($permissions->roles->count() > 0)
                <ul>
                  @foreach ($permissions->roles as $role)
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
    <a href="{{ route('permissions.edit', $permissions->id) }}">Редактировать</a>
    <form class="form-horizontal" action="{{ route('permissions.delete', $permissions->id) }}" method="post">
      @csrf
      <button type="submit" class="btn btn-primary">
        Удалить
        <i class="icon-arrow-right14 position-right"></i>
      </button>
    </form>
    </div>
  </div>
@endsection
