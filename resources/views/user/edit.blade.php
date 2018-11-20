@extends('layouts.app')

@php
  $userRoleIds = $user->roles->pluck('id')->toArray();
@endphp

@section('content')
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Создание пользователя</h5>
    </div>
    <div class="panel-body">
      <form class="form-horizontal" action="{{ route('users.update', $user->id) }}" method="post">
        @csrf

        <fieldset class="content-group">
          <div class="form-group">
            <label class="control-label col-lg-2">Введите имя</label>
            <div class="col-lg-10">
              <input type="text" name="name" class="form-control" required value="{{ $user->name }}" placeholder="Ваше имя...">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-2">Введите email</label>
            <div class="col-lg-10">
              <input type="text" name="email" class="form-control" required  value="{{ $user->email }}" placeholder="email...">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-2">Введите пароль</label>
            <div class="col-lg-10">
              <input type="password" name="password" class="form-control" placeholder="пароль...">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-2">Подтвердите пароль</label>
            <div class="col-lg-10">
              <input type="password" name="confirm_password" class="form-control" placeholder="пароль...">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-2">Роли</label>
            <div class="col-lg-10">
              <select class="form-control" multiple name="roleIds[]">
                @foreach (\App\Role::orderBy('name')->get() as $role)
                  @if (in_array($role->id, $userRoleIds))
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
              Создать
              <i class="icon-arrow-right14 position-right"></i>
            </button>
          </div>

        </form>
      </div>
    </div>
  @endsection
