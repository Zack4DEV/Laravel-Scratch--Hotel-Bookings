<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<div id="app">
@vite('assets/LoginUsers.js')
    <LoginUsers />
    <script src="{{ asset('build/assets/LoginUsers.js') }}">
</script>

        @php
        $Username = $_POST['Username'];
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];
        $CPassword = $_POST['CPassword'];
        @endphp

        <!--  Employee Login + User Login &Signup -->
        @if (isset($_POST['Emp_login_submit']) || isset($_POST['user_login_submit']) )

            @if ($Username == "" || $Password == "")
                echo "<script>swal({
                title: 'Fill the proper details',
                icon: 'error',
                });
                </script>";
            @while(isset($_POST['user_signup_submit']))

                @if ($Username == "" || $Email == "" || $Password == "")
                      echo "<script>swal({
                      title: 'Fill the proper details',
                      icon: 'error',
                      });
                                </script>";
                      @endif
            @endwhile
            @endif
        @endif
</body>
</html>
