<form action="{{ route( 'admin.hello' ) }}" method="post" class="panel p-a-4" id="loginForm">

      {{ csrf_field() }}

      <fieldset class=" form-group form-group-lg">
        <input type="text" name="email" class="form-control" placeholder="Email">
      </fieldset>

      <fieldset class=" form-group form-group-lg">
        <input type="password" name="password" class="form-control" placeholder="Password">
      </fieldset>


      <!-- <div class="clearfix">
        <a href="#" class="font-size-12 text-muted" id="page-signin-forgot-link">Forgot your password?</a>
      </div> -->


      <button type="submit" class="btn btn-block btn-lg btn-primary m-t-3">LOGIN</button>
    </form>