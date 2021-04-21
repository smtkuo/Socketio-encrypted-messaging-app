<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<div class="container h-100">
<div class="d-flex justify-content-center">
<div class="card mt-5 col-md-4 animated bounceInDown myForm">
<div class="card-header">
<h4>Sign In Mesaj.Link</h4>
</div>
<div class="card-body">
<div id="dynamic_container">
<div class="input-group mt-3">
<div class="input-group-prepend">
<span class="input-group-text br-15"><i class="fa fa-at"></i></span>
</div>
<input type="email" placeholder="Your Mail" class="form-control inp_yourmail"/>
</div>
<div class="input-group mt-3">
<div class="input-group-prepend">
<span class="input-group-text br-15"><i class="fa fa-key"></i></span>
</div>
<input type="password" placeholder="Your Password" class="form-control inp_yourpass"/>
</div>
</div>
<div class="mt-3">
<button type="submit" class="btn btn-success btn-sm float-right submit_btn" onclick='PageFunction.getFunction({ how : "function", query : "signin", post: Function.getFunction("signinform")});'><i class="fas fa-arrow-alt-circle-right"></i> Sign In</button>
</div>
</div>
<div class="card-footer">
</div>
</div>
</div>
</div>