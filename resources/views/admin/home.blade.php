@extends('layouts.admin_base')
@section('content')
    <h1>
        day la trang admin home
    </h1>

    <x-adminlte-card theme="lime" theme-mode="outline">
        A card without header...
    </x-adminlte-card>

    <x-adminlte-callout>Minimal example</x-adminlte-callout>

    {{-- themes --}}
    <x-adminlte-callout theme="info" title="Information">
        Info theme callout!
    </x-adminlte-callout>
    <x-adminlte-callout theme="success" title="Success">
        Success theme callout!
    </x-adminlte-callout>
    <x-adminlte-callout theme="warning" title="Warning">
        Warning theme callout!
    </x-adminlte-callout>
    <x-adminlte-callout theme="danger" title="Danger">
        Danger theme callout!
    </x-adminlte-callout>


    {{-- Custom --}}
    <x-adminlte-callout theme="success" class="bg-teal" icon="fas fa-lg fa-thumbs-up" title="Done">
        <i class="text-dark">Your payment was complete!</i>
    </x-adminlte-callout>
    <x-adminlte-callout theme="danger" title-class="text-danger text-uppercase"
                        icon="fas fa-lg fa-exclamation-circle" title="Payment Error">
        <i>There was an error on the payment procedure!</i>
    </x-adminlte-callout>
    <x-adminlte-callout theme="info" class="bg-gradient-info" title-class="text-bold text-dark"
                        icon="fas fa-lg fa-bell text-dark" title="Notification">
        This is a notification.
    </x-adminlte-callout>
    <x-adminlte-callout theme="danger" class="bg-gradient-pink" title-class="text-uppercase"
                        icon="fas fa-lg fa-leaf text-purple" title="observation">
        <i>A styled observation for the user.</i>
    </x-adminlte-callout>





    {{-- Complex / Extra tool / Footer --}}
    <x-adminlte-card title="Form Card" theme="maroon" theme-mode="outline"
                     class="elevation-3" body-class="bg-maroon" header-class="bg-light"
                     footer-class="bg-maroon border-top rounded border-light"
                     icon="fas fa-lg fa-bell" collapsible removable maximizable>
        <x-slot name="toolsSlot">
            <select class="custom-select w-auto form-control-border bg-light">
                <option>Skin 1</option>
                <option>Skin 2</option>
                <option>Skin 3</option>
            </select>
        </x-slot>
        <x-adminlte-input name="User" placeholder="Username"/>
        <x-adminlte-input name="Pass" type="password" placeholder="Password"/>
        <x-slot name="footerSlot">
            <x-adminlte-button class="d-flex ml-auto" theme="light" label="submit"
                               icon="fas fa-sign-in"/>
        </x-slot>
    </x-adminlte-card>
@endsection
