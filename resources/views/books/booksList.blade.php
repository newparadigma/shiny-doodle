@extends('layouts.app')
@section('content')
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Книги</h5>
    </div>
    <div class="panel-body">
      Таблица
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Название</th>
            <th>Описание</th>
            <th>Время добавления</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($books as $key => $books)
            <tr>
              <td>{{$books->id}}</td>
              <td>{{$books->name}}</td>
              <td>{{$books->description}}</td>
              <td>{{$books->created_at}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
          <a href="{{ route('books.newBook')}}">Добавить книгу</a>
    </div>
  </div>
@endsection
