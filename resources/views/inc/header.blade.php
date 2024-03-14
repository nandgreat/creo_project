<nav class="navbar navbar-expand-md" style="margin: 0px; padding:0">
    <div class="container-fluid" style="justify-content: space-between; background-color:#2D93B3; margin:0; display: flex; align-items: center;">
        <div style="display: flex; flex:1; justify-content: flex-start; margin-left:200px">
            <img src='{{asset("asset/creo_logo.png")}}' width='200'>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" style="margin-right: 20px; justify-content: center;" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" style="color:white" aria-current="page" href="#">How It Works</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white" href="#">Personal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white" href="#">Business</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white" href="#">Pricing</a>
                </li>

                @if(!Auth::check())
                <li class="nav-item" style="background-color: #D9A014;">
                    <a class="nav-link" style="color:white" href="{{route('register')}}">Register</a>
                </li>
                <li class="nav-item" style="background-color: #D9A014; margin-left:20px; padding-left:10px;padding-right:10px">
                    <a class="nav-link" style="color:white" href="{{route('login')}}">Login</a>
                </li>
                @else
                <li class="nav-item" style="">
                    <a class="nav-link" style="color:white" href="{{route('register')}}">{{auth()->user()->first_name}}</a>
                </li>

                <li class="nav-item" style=" margin-left:20px; padding-left:10px;padding-right:10px">
                    <a class="nav-link" style="color:white" href="{{route('logout')}}">Logout</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>