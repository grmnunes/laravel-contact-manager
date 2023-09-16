@extends('adminlte::page')

@section('title', 'Details')

@section('content_header')

    <h1>
        <i class="fas fa-arrow-left text-primary" onclick="window.history.back();" style="cursor: pointer;"></i>
        Contact details
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row d-flex align-items-center justify-content-between">
                <h3 class="card-title">
                    <i class="fas fa-user"></i>
                    Details
                </h3>
                @can('is_logged_in')
                    <div class="actions">
                        <a
                            class="btn btn-primary"
                            href="{{ route('contacts.edit', $contact->id) }}"
                            >
                            <i class="fas fa-edit"></i>
                            Edit
                        </a>
                        <button
                            class="btn btn-danger"
                            data-toggle="modal"
                            data-target="#modal-destroy"
                            >
                            <i class="fas fa-trash"></i>
                            Remove
                        </button>
                    </div>
                @endcan
            </div>
        </div>

        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-4">Name:</dt>
                <dd class="col-sm-8">{{ $contact->name }}</dd>
                <dt class="col-sm-4">Email:</dt>
                <dd class="col-sm-8">{{ $contact->email }}</dd>
                <dt class="col-sm-4">Contact:</dt>
                <dd class="col-sm-8">{{ $contact->contact_number }}</dd>
            </dl>
        </div>
    </div>
    @can('is_logged_in')
        @include('admin.contacts._includes.modal-destroy')
    @endcan

@stop
