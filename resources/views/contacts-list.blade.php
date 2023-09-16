@extends('adminlte::page')

@section('title', 'Contacts')

@section('content_header')
<h1>Contacts</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header col">
            <div class="row d-flex align-items-center justify-content-between">
                <h3 class="card-title">Contact list</h3>
            </div>
        </div>

        @if ($contacts)
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th style="width: 18rem;">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $item )
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->contact_number }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <a
                                        href="{{ route('guest.contact.show', $item->id) }}"
                                        class="text-secondary btn-link m-2"
                                        >
                                        <i class="fas fa-eye"></i></i> Show
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@stop

@section('css')
    <style>
        div#DataTables_Table_0_filter, div#DataTables_Table_0_length {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            padding: 14px;
            margin-top: 14px;
        }
    </style>
@stop

@section('js')
    <script>
        jQuery(function ($) {
            $(".table").DataTable({
                "searching": true,
                "paging": true,
                "info": false,
                "ordering": true,
                "columnDefs": [
                    { "orderable": false, "targets": [-1] },
                ],
            });
        });
    </script>
@stop

