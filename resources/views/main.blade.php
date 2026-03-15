@extends('layouts.layout')

@section('main_section')
    <h1>Текущая дата и время: {{date("d.m.y")}} - {{date("H:i:s")}}</h1>

@endsection
