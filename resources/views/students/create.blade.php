@extends('students.layout')
@section('title', 'Добавить студента')
@section('content')
<div class="head"><h1>Добавить студента</h1></div>
<form method="post" action="{{ route('students.store') }}">
    @csrf
    <label for="full_name">ФИО</label>
    <input id="full_name" name="full_name" type="text" maxlength="255" required autocomplete="name" value="{{ old('full_name') }}" aria-invalid="{{ $errors->has('full_name') ? 'true' : 'false' }}" @if($errors->has('full_name')) aria-describedby="full_name_error" @endif>
    @error('full_name')<p class="error" id="full_name_error" role="alert">{{ $message }}</p>@enderror

    <label for="group_name">Группа</label>
    <input id="group_name" name="group_name" type="text" maxlength="100" required value="{{ old('group_name') }}" aria-invalid="{{ $errors->has('group_name') ? 'true' : 'false' }}" @if($errors->has('group_name')) aria-describedby="group_name_error" @endif>
    @error('group_name')<p class="error" id="group_name_error" role="alert">{{ $message }}</p>@enderror

    <label for="email">Email</label>
    <input id="email" name="email" type="email" maxlength="255" required autocomplete="email" value="{{ old('email') }}" aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}" @if($errors->has('email')) aria-describedby="email_error" @endif>
    @error('email')<p class="error" id="email_error" role="alert">{{ $message }}</p>@enderror

    <div class="actions"><button type="submit" class="btn">Сохранить</button><a class="back" href="{{ route('students.index') }}">Вернуться к списку</a></div>
</form>
@endsection
