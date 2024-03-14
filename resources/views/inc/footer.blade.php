<section>
    <div class="container text-center">
      <div class="row justify-content-start row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class='subscribe-notice '>
                <p>Signup for our newsletter</p>
            </div>
        </div>
        <div class="col row">
        <div class="col-sm-6 col-md-6 subscribe-form ">

            <input type='text' class='form-control m-2 w-100' placeholder="Email">
            <button class='btn btn-primary m-2 w-100'>Sign Up</button>
        </div>
        </div>
      </div>
</div>
  </section>
<section>
    @if (auth()->check())
        @if (auth()->user()->accountType == 'Users')
            <div class='chartfixed'><a href='/chat'><img src='{{asset("asset/svg/chart.svg")}}' width='50'></a></div>
        @else
        <div class='chartfixed'><a href='/admin/chat'><img src='{{asset("asset/svg/chart.svg")}}' width='50'></a></div>
        @endif
    @endif
</section>
