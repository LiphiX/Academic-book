@extends('layouts.layout')

@section('meta_section')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('main_section')
    <div class="d-flex flex-column justify-content-center align-items-center overflow-x-auto">
        <h1>Данные о преподавателях</h1>
        <table id="teacherTable" class="table table-dark table-hover table-striped table-bordered rounded-5">
            <thead>
            <td>ФИО</td>
            <td>Паспорт</td>
            <td>Факультет</td>
            <td>Действие</td>
            </thead>
            <tbody>
            @foreach($teachers as $teacher)
                <tr data-id="{{$teacher->id}}">
                    <td>{{$teacher->person->surname}} {{mb_substr($teacher->person->name, 0, 1, 'UTF-8')}}. {{$teacher->person->patronymic ? mb_substr($teacher->person->patronymic, 0, 1, 'UTF-8') . '.' : ""}}</td>
                    <td>{{$teacher->person->passport}}</td>
                    <td>{{$teacher->department->name}}</td>
                    <td><a class="btn btn-outline-light dismiss">Уволить</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center">
            <button id="uploadButton" class="btn btn-primary">Загрузить</button>
        </div>
    </div>
@endsection

@section('scripts_section')
    <script src="{{asset("/js/teacher.js")}}"></script>
@endsection
