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
                <a href="{{ route('contacts.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> New contact
                </a>
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
                                        href="{{ route('contacts.edit', $item->id) }}"
                                        class="text-primary btn-link m-2"
                                        >
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a
                                        href="{{ route('contacts.show', $item->id) }}"
                                        class="text-secondary btn-link m-2"
                                        >
                                        <i class="fas fa-eye"></i></i> Show
                                    </a>
                                    <a
                                        href="{{ route('contacts.destroy', $item->id) }}"
                                        class="text-danger btn-link m-2 button-destroy"
                                        data-toggle="modal"
                                        data-target="#modal-destroy"
                                        data-name="{{ $item->name }}"
                                        >
                                        <i class="fas fa-trash"></i> Remove
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="modal-destroy">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Do you really want to delete the contact?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"><strong>Name:</strong> <p id="contact-name"></p></div>
                <div class="modal-footer">
                    <form action="" id="contact-destroy" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Remove
                        </button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
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

            $('.button-destroy').on('click', function () {
                const contactName = $(this).data('name');
                const destroyUrl = $(this).attr('href');

                $(document).find('form#contact-destroy').attr('action', destroyUrl);
                $(document).find('p#contact-name').html(contactName);
            });
        });
    </script>
@stop
