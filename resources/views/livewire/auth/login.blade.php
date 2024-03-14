<div class='row justify-content-center col-md-8 offset-2'>




    {{-- The best athlete wants his opponent at his best. --}}
    <div class='col top-20 '>
        <form class='register'>
            <h1 class='customHeader text-center'>Login</h1>
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
                <label class='check'>Email</label>
                <input type='email' wire:model="email" name='email' class='form-control' placeholder="Email Address">
                @error('email') <span class="text-danger error">{{ $message }}</span>@enderror

            </div>
            <div class='form-group'>
                <label class='check'>Password</label>
                <input type='password' wire:model="password" name='password' class='form-control' placeholder="Password">
                @error('password') <span class="text-danger error">{{ $message }}</span>@enderror

            </div>
            <div class='form-group'>
                <div class='row'>
                    <div class='col'><label class='check'><input type="checkbox" class='bg-primary check'>Remember</label></div>
                    <div class='col'><a href='/forgot' class='text-pr'>Forgot Password?</a></div>
                </div>


                <a class='btn w-100' style="background-color: #D9A014;" wire:click.prevent="login">Login</a>
            </div>
            <div class='text-top-10'>
                <p class='color-primary '>Don't have? <a href='/register' class='text-pr'>Create Account</a></p>

            </div>
        </form>
    </div>
</div>