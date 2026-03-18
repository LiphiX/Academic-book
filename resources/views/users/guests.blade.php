@extends('layouts.layout')

@section('meta_section')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('main_section')
    <div class="d-flex flex-column justify-content-center align-items-center overflow-x-auto">
        <h1>Данные о гостях</h1>
        <btn class="btn btn-outline-light registration my-3">Зарегистрировать нового пользователя</btn>
        <table id="studentsTable" class="table table-dark table-hover table-striped table-bordered rounded-5">
            <thead>
            <td>ФИО</td>
            <td>Паспорт</td>
            <td>Логин</td>
            <td>Назначить студентом</td>
            <td>Назначить преподавателем</td>
            <td>Удаление с системы</td>
            </thead>
            <tbody>
            @foreach($guests as $guest)
                <tr data-id="{{$guest->id}}">
                    <td>{{$guest->person->surname}} {{mb_substr($guest->person->name, 0, 1, 'UTF-8')}}
                        . {{$guest->person->patronymic ? mb_substr($guest->person->patronymic, 0, 1, 'UTF-8') . '.' : ""}}</td>
                    <td>{{$guest->person->passport}}</td>
                    <td>{{$guest->login}}</td>
                    <td>
                        <btn class="btn btn-outline-light student" data-bs-toggle="modal" data-bs-target="#studentModal">Студент</btn>
                    </td>
                    <td>
                        <btn class="btn btn-outline-light teacher">Преподаватель</btn>
                    </td>
                    <td>
                        <btn class="btn btn-outline-light delete">Удалить</btn>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="studentModalLabel">Назначение студента</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="studentForm">
                            <div class="mb-3">
                                <label class="form-label">Фамилия</label>
                                <input class="form-control" type="text" name="surname">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Имя</label>
                                <input class="form-control" type="text" name="name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Отчество</label>
                                <input class="form-control" type="text" name="patronymic">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Группа</label>
                                <select id="selectGroup" class="form-select">
                                    @foreach($groups as $group)
                                        <option data-group-id="{{$group->id}}" @if($group->id == 1) selected @endif>
                                            {{$group->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" id="studentFormSubmit" class="btn btn-outline-light">Сохранить изменения </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="teacherModal" tabindex="-1" aria-labelledby="teacherModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="teacherModalLabel">Назначение преподавателя</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="teacherForm">
                            <div class="mb-3">
                                <label class="form-label">Фамилия</label>
                                <input class="form-control" type="text" name="surname">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Имя</label>
                                <input class="form-control" type="text" name="name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Отчество</label>
                                <input class="form-control" type="text" name="patronymic">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Факультет</label>
                                <select id="selectFaculty" class="form-select">
                                    @foreach($faculties as $faculty)
                                        <option data-faculty-id="{{$faculty->id}}" @if($faculty->id == 1) selected @endif>
                                            {{$faculty->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" id="teacherFormSubmit" class="btn btn-outline-light">Сохранить изменения </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button id="uploadButton" class="btn btn-primary">Загрузить</button>
        </div>
    </div>
@endsection

@section('scripts_section')
    <script src="{{asset("/js/guests.js")}}"></script>
@endsection
