@extends('layouts.layout')

@section('main_section')
    <div class="d-flex flex-column justify-content-center align-items-center overflow-x-auto">
        <h1>Данные о студентах</h1>
        <table id="studentsTable" class="table table-dark table-hover table-striped table-bordered rounded-5">
            <thead>
            <td>ФИО</td>
            <td>Паспорт</td>
            <td>Группа</td>
            <td>Средняя посещаемость</td>
            <td>Средняя успеваемость</td>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr data-id="{{$student->id}}">
                        <td>{{$student->person->surname}} {{mb_substr($student->person->name, 0, 1, 'UTF-8')}}. {{$student->person->patronymic ? mb_substr($student->person->patronymic, 0, 1, 'UTF-8') . '.' : ""}}</td>
                        <td>{{$student->person->passport}}</td>
                        <td>
                            <select class="form-select" name="groups">
                                @foreach($groups as $group)
                                    <option data-group-id="{{$group->id}}" @if($group->id == $student->group->id) selected @endif>
                                        {{$group->name}}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>{{$student->averageAssessment()}}</td>
                        <td>{{$student->averageAttendance()}}</td>
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
    <script src="{{asset("/js/students.js")}}"></script>
@endsection
