@extends('layouts.app')
@section('content')
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Новая новость</h5>
    </div>
    <div class="panel-body">
      <form class="form-horizontal" action="{{ route('news.create') }}" method="post">
        @csrf
        <fieldset class="content-group">

          <div class="form-group">
            <label class="control-label col-lg-2">Заголовок</label>
            <div class="col-lg-10">
              <input type="text" name="title" class="form-control" required
              placeholder="...">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-2">Текст</label>
            <div class="col-lg-10">
              <input type="text" name="text" class="form-control" required
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
