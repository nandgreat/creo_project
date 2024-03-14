<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class='m-5'>
        <div class='form-container addresource'>
            <form >
            <h1 class='customHeader'>Make Request</h1>

            <div class='form-group'>
                <label>First Name</label>
                <input type='text' wire:model="first_name"  name='first_name' class='form-control' placeholder="First Name">
                @error('first_name') <span class="text-danger error">{{ $message }}</span>@enderror

            </div>
            <div class='form-group'>
                <label>Last Name</label>

                <input type='text' wire:model="last_name"  name='last_name' class='form-control' placeholder="Last Name">
                @error('last_name') <span class="text-danger error">{{ $message }}</span>@enderror

            </div>

            <div class='form-group'>
                <label>Email</label>

                <input type='text' wire:model="email"  name='email' class='form-control' placeholder="Email">
                @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class='form-group'>
                <label>Phone</label>

                <input type='text' wire:model="phone"  class='form-control' placeholder="Phone">
                @error('phone') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class='form-group'>
                <label>Reference Number</label>

                <input type='text' wire:model="reference"  class='form-control' placeholder="Reference Number">
                @error('reference') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class='form-group'>
                <label>Message</label>

                <textarea type='text' wire:model="message"  class='form-control' placeholder="Request"></textarea>
                @error('reference') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class='text-center'><button class='btn btn-danger' wire:click.prevent='store'>Submit</button></div>
        </form>
</div>
</div>
</div>
</div>
