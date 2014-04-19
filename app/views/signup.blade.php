@extends('layouts.master')

@section('content')
{{ Form::open(array('action' => 'singupController@singUp', 'class' => 'form-signin', 'id' => 'formSignup')) }}
<h2 class="form-signin-heading">Sign In</h2>
  <div class="container" id="content">
  <div class="row">
  <div class="span4 offset4">
    <div class="input-prepend">
      <span class="add-on"><i class="icon-envelope"></i></span>
      <input type="email" class="span3" name="email" placeholder="Your Email" required maxlength="60" autofocus />
    </div>
    <br>
    <div class="input-prepend">
      <span class="add-on"><i class="icon-lock"></i></span>
      <input type="text" class="span3" name="password" placeholder="Your Password" required maxlength="60" />
    </div>
    <br>
    <button type="submit" class="btn btn-block btn-primary">
    <i class="icon-edit icon-white"></i> Sign up</button>
    <button type="submit" class="btn btn-block btn-primary">
    <i class="icon-edit icon-white"></i> Sign up</button>
    <a id="successLink" href="<?=Url::to('posts'); ?>" class="btn btn-block btn-success" style="display: none">Successful, go to home!</a>
    <a id="errorLink" href="<?=Url::to('signUp'); ?>" class="btn btn-block btn-danger" style="display: none">Error, try again!</a>
  </div>
</div> <!-- /container -->
</div>

  <!-- javascript -->
  <script>

  $(document).ready(function() {

    $('#formSignup').submit(function() {

      var form = $(this);
      var button = form.children('button');
      button.prop('disabled', true);
      
      var formUrl = form.attr('action');
      var formData = form.serialize();

      $.post(formUrl, formData, function(response) {
        
        if (response.success) {
          button.remove();
          $('#successLink').show();
        } else {
          button.remove();
          $('#errorLink').show();
        }     
      });

      return false;
    });

  });

  </script>

@stop
