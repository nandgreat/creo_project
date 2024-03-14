<div class='row justify-content-center row-cols-1 row-cols-md-2 g-4'>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class='col top-20'>
        <form class='register'>
            <h1 class='customHeader'>REGISTER</h1>
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

            <div class='form-group'>
                <input type='text' wire:model="first_name" name='first_name' class='form-control' placeholder="First Name">
                @error('first_name') <span class="text-danger error">{{ $message }}</span>@enderror

            </div>
            <div class='form-group'>
                <input type='text' wire:model="last_name" name='last_name' class='form-control' placeholder="Last Name">
                @error('last_name') <span class="text-danger error">{{ $message }}</span>@enderror

            </div>
            <div class='form-group'>
                <input type='email' wire:model="email" name='email' value="{{$email}}" class='form-control' placeholder="Email Address">
                @error('email') <span class="text-danger error">{{ $message }}</span>@enderror

            </div>
            <div class='form-group'>
                <input type='password' wire:model="password" name='password' class='form-control' placeholder="Password">
                @error('password') <span class="text-danger error">{{ $message }}</span>@enderror

            </div>
            <div class='form-group'>
                <input type='password' wire:model="comfirm_password" name='comfirm_password' class='form-control w-100' placeholder="Comfirm Password">
                @error('comfirm_password') <span class="text-danger error">{{ $message }}</span>@enderror

            </div>
            <div class='form-group'>
                <label class='check'><input type="checkbox" class='bg-primary check'> By registering, I agree with the Terms of Use & Privacy Policy</label>

                <a class='btn w-100' style="background-color: #D9A014;" wire:click.prevent="store">Register</a>
            </div>
            <p class='color-primary m-3'>Already have an account, please<a href='/login' class='text-pr'> login</a></p>
        </form>
    </div>

</div>