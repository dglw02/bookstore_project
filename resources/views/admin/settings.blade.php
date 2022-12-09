@extends('layouts.admin_base')
@section('content')

    <x-adminlte-profile-widget name="Duong Luu" desc="Administrator" theme="teal"
                               img="https://picsum.photos/id/1/100">
        <x-adminlte-profile-col-item title="Followers" text="125" url="#"/>
        <x-adminlte-profile-col-item title="Following" text="243" url="#"/>
        <x-adminlte-profile-col-item title="Posts" text="37" url="#"/>
    </x-adminlte-profile-widget>
@endsection
