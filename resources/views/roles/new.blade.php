@extends('layouts.app')
@section('content')
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Новая роль</h5>
    </div>
    <div class="panel-body">
      <form class="form-horizontal" action="{{ route('roles.create') }}" method="post">
        @csrf
        <fieldset class="content-group">

          <div class="form-group">
            <label class="control-label col-lg-2">Название</label>
            <div class="col-lg-10">
              <input type="text" name="name" class="form-control" required
              placeholder="...">
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
