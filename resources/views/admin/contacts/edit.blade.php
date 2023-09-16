@extends('adminlte::page')

@section('title', 'Contacts | Edit')

@section('content_header')
<h1>Edit contact</h1>
@stop

@section('content')
    @if (session('error'))
        <div class="alert alert-danger mt-4">
            <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
        </div>
    @endif
    <div class="card card-light">
        <div class="card-header col">
            <div class="row d-flex align-items-center justify-content-between">
                <h3 class="card-title">Contact information</h3>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
                @method('PUT')
                @csrf
                @include('admin.contacts._includes.create-edit-form')
                <button type="submit" class="btn btn-primary float-right mt-2">
                    <i class="fas fa-save"></i> Save
                </button>
            </form>
        </div>
    </div>
@stop

