@extends('layouts.layout')

@section('main_section')
    <div class="m-2 p-2">
        <div class="d-flex justify-content-center gap-4 mb-4">
            <div class="d-block fs-4 card-form p-3 flex-grow-0">
                <p>ФИО: <b>{{$user->person->surname}} {{mb_substr($user->person->name, 0, 1, 'UTF-8')}}. {{$user->person->patronymic ? mb_substr($user->person->patronymic, 0, 1, 'UTF-8') . '.' : ""}}</b></p>
                <p>Серия и номер паспорта: <b>{{$user->person->passport}}</b></p>
            </div>

            <div class="d-block card-profile p-3 ms-auto me-auto">
                <div class="d-flex">
                    <div class="card-profile-item">
                        <label for="surname" class="card-profile-item-label">Фамилия</label>
                        <input id="surname" class="card-profile-item-input" readonly value="{{$user->person->surname}}"/>
                    </div>
                    <div class="card-profile-item">
                        <label for="name" class="card-profile-item-label">Имя</label>
                        <input id="name" class="card-profile-item-input" readonly value="{{$user->person->name}}">
                    </div>
                    <div class="card-profile-item">
                        <label for="patronymic" class="card-profile-item-label">Отчество</label>
                        <input id="patronymic" class="card-profile-item-input" readonly value="{{$user->person->patronymic ?? "Не указано"}}"/>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="card-profile-item">
                        <label for="login" class="card-profile-item-label">Логин</label>
                        <input id="login" class="card-profile-item-input" readonly value="{{$user->login}}"/>
                    </div>
                    <div class="card-profile-item">
                        <label for="passport" class="card-profile-item-label">Паспорт</label>
                        <input id="passport" class="card-profile-item-input" readonly value="{{$user->person->passport}}"/>
                    </div>
                </div>

                @if($user->person->student)
                    <div class="d-flex">
                        <div class="card-profile-item">
                            <label for="department" class="card-profile-item-label">Факультет</label>
                            <input id="department" class="card-profile-item-input" readonly value="{{$user->person->student->group->speciality->department->name}}"/>
                        </div>
                        <div class="card-profile-item">
                            <label for="speciality" class="card-profile-item-label">Направление</label>
                            <input id="speciality" class="card-profile-item-input" readonly value="{{$user->person->student->group->speciality->name}}"/>
                        </div>
                    </div>
                @endif
                @if($user->person->teacher)
                    <div class="d-flex">
                        <div class="card-profile-item">
                            <label for="department" class="card-profile-item-label">Факультет</label>
                            <input id="department" class="card-profile-item-input" readonly value="{{$user->person->student->group->speciality->department->name}}"/>
                        </div>
                    </div>
                @endif

                <!--
                <div class="d-flex">
                    <div class="card-profile-item">
                        <label for="loginDate" class="card-profile-item-label">Дата последнего входа</label>
                        <input id="loginDate" class="card-profile-item-input" readonly value="{{$user->session}}">
                    </div>
                </div>
                -->
            </div>
        </div>
        <div class="d-flex justify-content-start">
            <p>Права пользователя:</p>
            @switch($user->role->name)
                @case('users')
                    <p>Гостевые</p>
                    @break
                @case('student')
                    <p>Студенческие</p>
                    @break
                @case('teacher')
                    <p>Преподавательские</p>
                    @break
                @case('administrator')
                    <p>Административные</p>
                    @break
            @endswitch
        </div>
    </div>
@endsection
