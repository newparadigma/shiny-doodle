@extends('layouts.app')

@php
  $permissionsRoleIds = $permissions->roles->pluck('id')->toArray();
@endphp

@section('content')
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Редактирование права</h5>
    </div>
    <div class="panel-body">
      <form class="form-horizontal" action="{{ route('permissions.update', $permissions->id) }}" method="post">
        @csrf

        <fieldset class="content-group">
          <div class="form-group">
            <label class="control-label col-lg-2">Введите новое название</label>
            <div class="col-lg-10">
              <input type="text" name="name" class="form-control" required value="{{ $permissions->name }}" placeholder="новое название...">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-2">Введите Диспей Нейм</label>
            <div class="col-lg-10">
              <input type="text" name="display_name" class="form-control" required  value="{{ $permissions->display_name }}" placeholder="Диспей Нейм...">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-2">Роли</label>
            <div class="col-lg-10">
              <select class="form-control" multiple name="roleIds[]">
                @foreach (\App\Role::orderBy('name')->get() as $role)
                  @if (in_array($role->id, $permissionsRoleIds))
                    <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                  @else
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                  @endif
                @endforeach
              </select>
            </div>
          </div>

          <div class="text">
            <button type="submit" class="btn btn-primary">
              Редактировать
              <i class="icon-arrow-right14 position-right"></i>
            </button>
          </div>

        </form>
      </div>
    </div>
  @endsection
