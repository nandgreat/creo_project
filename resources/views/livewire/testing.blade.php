<div class="container" style="margin-bottom: 30px; margin-top:50px">

  <form class='register' wire:submit.prevent="save">
    <h2 style="align-items: center; text-align: center;">Test Software</h2>

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

      <label>Programming Language </label>
      <select class='form-control' wire:model='language' required>
        <option value="">-- Select Language --</option>
        <option value="Javascript">Javascript</option>
        <option value="Python">Python</option>
        <option value="Java">Java</option>
      </select>
      <h5>Paste Code Below</h5>
      <textarea class='form-control' wire:model='code_script' style="background-color: #EEEEEE;" rows="10" required></textarea>
    </div>
    <div class='form-group mb-2' style="padding-top: 20px; padding-bottom:20px;">
      <button class='btn w-100' style="background-color: #D9A014;" type="submit">Next</button>
    </div>
    <div class='text-top-10'>

    </div>
  </form>
</div>


<div class='row justify-content-center'>
  <div class="col-md-8 row" style="margin-top: 50px; margin-bottom:50px; padding-top: 50px; padding-bottom: 50px; background-color: #F4EEEE; display:flex; justify-content:space-evenly">

    <div class="col-md-3" style="display:flex; flex-direction:column; align-items: center; margin-left:10px; margin-right:10px; margin-bottom:20px">
      <img class="" style="align-items:center;" src='{{asset("asset/interface_image.png")}}' width='300'>

      <p style="text-align: center;margin-top:20px">Pre- nuill femnates lo
        common lesing scenaros.
        Shareable templates
        within the freo communilv</p>
    </div>

    <div class="col-md-3" style="display:flex; flex-direction:column; align-items: center; margin-left:10px; margin-right:10px; margin-bottom:20px">
      <img class="" style="align-items:center;" src='{{asset("asset/web_element_image.png")}}' width='300'>

      <p style="text-align: center;margin-top:20px">Online forum for users to
        share tips, ask questions, and discuss best.</p>
    </div>

    <div class="col-md-3" style="display:flex; flex-direction:column; align-items: center; margin-left:10px; margin-right:10px; margin-bottom:20px">
      <img class="" style="align-items:center;" src='{{asset("asset/html_image.png")}}' width='300'>

      <p style="text-align: center;margin-top:20px">Introduction of a free tier for
        individual users.</p>

    </div>

    <div class="col-md-3" style="display:flex; flex-direction:column; align-items: center; margin-left:10px; margin-right:10px; margin-bottom:20px">
      <img class="" style="align-items:center;" src='{{asset("asset/html_image_2.png")}}' width='300'>

      <p style="text-align: center;margin-top:20px">Integrated debugging
        tools to identify and
        Troubleshootissuesinhes</p>

    </div>

    <div class="col-md-3" style="display:flex; flex-direction:column; align-items: center; margin-left:10px; margin-right:10px; margin-bottom:20px">
      <img class="" style="align-items:center;" src='{{asset("asset/interface_2.png")}}' width='300'>

      <p style="text-align: center;margin-top:20px">Advanced reporting tools
        to analyze test results.</p>

    </div>

    <div class="col-md-3" style="display:flex; flex-direction:column; align-items: center; margin-left:10px; margin-right:10px; margin-bottom:20px">
      <img class="" style="align-items:center;" src='{{asset("asset/html_image_3.png")}}' width='300'>

      <p style="text-align: center;margin-top:20px">Low balancing and performance optimization for enterprise level usage</p>

    </div>

    <div class="col-md-3" style="display:flex; flex-direction:column; align-items: center; margin-left:10px; margin-right:10px; margin-bottom:20px">
      <img class="" style="align-items:center;" src='{{asset("asset/html_image_4.png")}}' width='300'>

      <p style="text-align: center;margin-top:20px">Integrated debugging
        tools to identify and
        Troubleshootissuesinhes</p>

    </div>

    <div class="col-md-3" style="display:flex; flex-direction:column; align-items: center; margin-left:10px; margin-right:10px; margin-bottom:20px">
      <img class="" style="align-items:center;" src='{{asset("asset/html_image_5.png")}}' width='300'>

      <p style="text-align: center;margin-top:20px">Advanced reporting tools
        to analyze test results.</p>

    </div>

    <div class="col-md-3" style="display:flex; flex-direction:column; align-items: center; margin-left:10px; margin-right:10px; margin-bottom:20px">
      <img class="" style="align-items:center;" src='{{asset("asset/interface_image_3.png")}}' width='300'>

      <p style="text-align: center;margin-top:20px">Low balancing and performance optimization for enterprise level usage</p>

    </div>

  </div>

</div>