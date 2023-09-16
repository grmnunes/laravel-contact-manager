@extends('adminlte::page')

@section('title', 'Contacts | New')

@section('content_header')
    <h1>Register new contact</h1>
    @if (session('error'))
        <div class="alert alert-danger mt-4">
            <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
        </div>
    @endif
@stop

@section('content')
    <div class="card card-light ">
        <div class="card-header">
            <h3 class="card-title">Contact information</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('contacts.store') }}" method="POST">
                @csrf
                @include('admin.contacts._includes.create-edit-form')
                <button type="submit" class="btn btn-primary float-right mt-2">
                    <i class="fas fa-save"></i> Save
                </button>
            </form>
        </div>
    </div>
@stop

