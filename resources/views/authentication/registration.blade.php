@extends('layouts.layout')

@section('main_section')
    <div class="d-flex justify-content-center align-items-center m-4">
        <form action="{{ route("registration") }}" method="post" class="card-form w-50 p-5">
            @csrf
            <div class="d-flex flex-column justify-content-center align-content-center">
                <div class="row">
                    <div class="mb-3 col">
                        <label class="form-label">Фамилия:</label>
                        <input name="surname" class="form-control" type="text" />
                        @error('surname')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col">
                        <label class="form-label">Имя:</label>
                        <input name="name" class="form-control" type="text" />
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Отчество:</label>
                    <input name="patronymic" class="form-control" type="text"/>
                    @error('patronymic')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Паспорт:</label>
                    <input name="passport" class="form-control" type="text"/>
                    @error('passport')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Логин:</label>
                    <input name="login" class="form-control" type="text" />
                    @error('login')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Пароль:</label>
                    <input name="password" class="form-control" type="password" />
                    @error('password')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="mb-3">
                        <label class="form-label">Подтвердите пароль:</label>
                        <input name="password_confirmation" class="form-control" type="password" />
                        @error('password_confirmation')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
