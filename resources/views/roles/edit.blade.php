@extends('layouts.app')

@php
  $rolePermissionsIds = $roles->permissions->pluck('id')->toArray();
@endphp

@section('content')
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Редактирование роли</h5>
    </div>
    <div class="panel-body">
      <form class="form-horizontal" action="{{ route('roles.update', $roles->id) }}" method="post">
        @csrf

        <fieldset class="content-group">
          <div class="form-group">
            <label class="control-label col-lg-2">Введите новое название</label>
            <div class="col-lg-10">
              <input type="text" name="name" class="form-control" required value="{{ $roles->name }}" placeholder="новое название...">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-2">Права</label>
            <div class="col-lg-10">
              <select class="form-control" multiple name="permissionsIds[]">
                @foreach (\App\Permission::orderBy('name')->get() as $permissions)
                  @if (in_array($permissions->id, $rolePermissionsIds))
                    <option value="{{ $permissions->id }}" selected>{{ $permissions->name }}</option>
                  @else
                    <option value="{{ $permissions->id }}">{{ $permissions->name }}</option>
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
