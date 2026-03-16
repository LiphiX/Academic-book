@extends('layouts.layout')

@section('main_section')
    <div class="d-flex flex-column justify-content-center align-content-center align-items-center m-1">
        <form method="post" action="{{ route('login') }}" class="authentication-form p-5">
            @csrf
            <div class="d-flex flex-column justify-content-center align-content-center">
                <div class="mb-3" data-bs-theme="dark">
                    <label class="form-label">Логин:</label>
                    <input name="login" class="form-control" type="text" />
                    @error('login')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <label class="form-label">Пароль:</label>
                <input name="password" class="form-control" type="password" />
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
        <div class="d-block">
            <p>
                Нет учётной записи?
                <a class="link" href="{{ route('registration') }}">Тогда выполните её регистрацию!</a>
            </p>
        </div>
    </div>
@endsection
