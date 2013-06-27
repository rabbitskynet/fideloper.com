    <div class="container">

      <form class="form-signin form-horizontal" method="post" action="/{{ $adminGroup }}/login">
        <h2 class="">Please sign in</h2>
        @if ( isset($auth_error) )
        <p>{{ $auth_error }}</p>
        @endif
        <div class="control-group @if( isset($errors) && $errors->has('email') ) error @endif">
          <label class="control-label" for="email">Email:</label>
          <div class="controls">
            <input type="email" id="email" name="email" placeholder="Email address" value="@if( isset($input['email']) ){{ $input['email'] }}@endif">
            @if( isset($errors) && $errors->has('email') )
            <span class="help-inline">{{ $errors->first('email') }}</span>
            @endif
            </div>
        </div>
        <div class="control-group @if( isset($errors) && $errors->has('password') ) error @endif">
            <label class="control-label" for="password">Password:</label>
            <div class="controls">
            <input type="password" id="password" name="password" placeholder="Password" value="@if( isset($input['password']) ){{ $input['password'] }}@endif">
            @if( isset($errors) && $errors->has('password') )
            <span class="help-inline">{{ $errors->first('password') }}</span>
            @endif
            </div>
        </div>
        <button class="btn btn-large btn-primary" type="submit">Sign in</button>
      </form>
    </div> <!-- /container -->