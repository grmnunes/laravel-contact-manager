<div class="modal" tabindex="-1" role="dialog" id="modal-destroy">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Do you really want to delete the contact?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <p>Information:</p>
        <ul>
            <li>Name: {{ $contact->name }}</li>
            <li>Email: {{ $contact->email }}</li>
        </ul>
        </div>
        <div class="modal-footer">
            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
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
