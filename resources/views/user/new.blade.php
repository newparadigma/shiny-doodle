@extends('layouts.app')
@section('content')
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Создание пользователя</h5>
    </div>
    <div class="panel-body">
      <form class="form-horizontal" action="{{ route('users.create') }}" method="post">
        @csrf

        <fieldset class="content-group">
          <div class="form-group">
            <label class="control-label col-lg-2">Введите имя</label>
            <div class="col-lg-10">
              <input type="text" name="name" class="form-control" required
              placeholder="Ваше имя...">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-2">Введите email</label>
            <div class="col-lg-10">
              <input type="text" name="email" class="form-control" required
              placeholder="email...">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-2">Введите пароль</label>
            <div class="col-lg-10">
              <input type="password" name="password" class="form-control" required
              placeholder="пароль...">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-2">Подтвердите пароль</label>
            <div class="col-lg-10">
              <input type="password" name="confirm_password" class="form-control" required placeholder="пароль...">
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
