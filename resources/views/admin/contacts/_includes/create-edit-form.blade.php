<div class="border p-4">
    <h5 class="text-secondary">
        <i class="fas fa-user-plus"></i>
        New contact
    </h5>
    <div class="row" x-data>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Name</label>
                <input
                    type="text"
                    class="form-control"
                    placeholder="Name"
                    name="name"
                    value="{{ $contact->name ?? old('name') }}"
                >
            </div>
            @error('name')
                <strong class="text-danger">
                    {{ $message }}
                </strong>
            @enderror
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Contact</label>
                <input
                    type="text"
                    x-mask="999999999"
                    class="form-control"
                    placeholder="Contact"
                    name="contact_number"
                    value="{{ $contact->contact_number ?? old('contact_number') }}"
                >
            </div>
            @error('contact_number')
                <strong class="text-danger">
                    {{ $message }}
                </strong>
            @enderror
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Email</label>
                <input
                    type="email"
                    class="form-control"
                    placeholder="Email"
                    name="email"
                    value="{{ $contact->email ?? old('email') }}"
                >
            </div>
            @error('email')
                <strong class="text-danger">
                    {{ $message }}
                </strong>
            @enderror
        </div>
    </div>
</div>
