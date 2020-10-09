<!DOCTYPE html>
<html>
  <head>
    <title>Verification Forget Password</title>
  </head>
  <body>
    <h2>Hi {{$user['name']}}</h2>
    <br/>
    Your registered email-id is {{$user['email']}} , Please click on the below link for verification.
    <br/>
    <a href="{{url('forgetverify', $user->token)}}">Verify Email</a>
  </body>
</html>