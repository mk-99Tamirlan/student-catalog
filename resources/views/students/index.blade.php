@extends('students.layout')
@section('title', 'Каталог студентов')
@section('content')
<div class="head">
    <h1>Каталог студентов</h1>
    <a class="btn" href="{{ route('students.create') }}">Добавить студента</a>
</div>
@if (session('success'))
    <div class="notice" role="status">{{ session('success') }}</div>
@endif
@if ($students->isEmpty())
    <p class="empty">Студентов пока нет</p>
@else
<div class="table-scroll">
    <table>
        <thead><tr><th scope="col">№</th><th scope="col">ФИО</th><th scope="col">Группа</th><th scope="col">Email</th></tr></thead>
        <tbody>
        @foreach ($students as $student)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $student->full_name }}</td>
            <td>{{ $student->group_name }}</td>
            <td>{{ $student->email }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endif
@endsection
