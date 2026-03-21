@extends('layouts.layout')

@section('main_section')
    @php
        $weekDays = [
            1 => 'Понедельник',
            2 => 'Вторник',
            3 => 'Среда',
            4 => 'Четверг',
            5 => 'Пятница',
            //6 => 'Суббота'
        ];
    @endphp

    <div class="table-responsive">
        <table class="table table-hover table-dark table-bordered align-middle ">
            <thead>
                <tr>
                    <td>Расписание</td>
                    @foreach(array_values($weekDays) as $day)
                        <td class="">{{$day}}</td>
                    @endforeach
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($calendarData as $pair => $days)
                    <tr>
                        <td>Пара {{ $pair }}</td>
                    @foreach(array_keys($weekDays) as $weekDay)
                        @if(isset($days[$weekDay]) && is_array($days[$weekDay]))
                            <td>
                                <div class="">
                                    <p class="">{{$days[$weekDay]['discipline']}}</p>
                                    <p class=" text-muted fs-7">{{$days[$weekDay]['class_type']}}</p>
                                    <p class="text-muted fs-7">{{$days[$weekDay]['teacher_surname']}} {{mb_substr($days[$weekDay]['teacher_name'], 0, 1, 'UTF-8')}}. {{$days[$weekDay]['teacher_patronymic'] ? mb_substr($days[$weekDay]['teacher_patronymic'], 0, 1, 'UTF-8') . '.' : ""}}</p>
                                </div>
                            </td>
                        @else
                            <td></td>
                        @endif
                    @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
