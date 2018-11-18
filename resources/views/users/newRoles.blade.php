@extends('layouts.app')
@section('content')
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Назначение ролей</h5>
    </div>
    <div class="panel-body">
      <form class="form-horizontal" action="{{ route('users.updateRole', $user->id) }}" method="post">
        @csrf
        <fieldset class="content-group">

        <select class="select" multiple name="select">
          @foreach (\App\Role::all() as $role)
            <option value="{{$role->id}}">{{$role->name}}</option>
          @endforeach
        </select>

          <div class="text">
            <button type="submit" class="btn btn-primary">
              Присвоить роли
              <i class="icon-arrow-right14 position-right"></i>
            </button>
          </div>

        </form>
      </div>
    </div>
  @endsection
