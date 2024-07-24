<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Login</h1>
    <form id="login_form">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
        </div>
        <button type="submit">Login</button>
    </form>

    <script>
        $(document).ready(function() {
            $('#login_form').on('submit', function(event) {
                event.preventDefault();

                $.ajax({
                    url: "<?php echo site_url('auth/login'); ?>",
                    type: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(data) {
                        if (data.status == 'success') {
                            window.location.href = "<?php echo site_url('dashboard'); ?>";
                        } else {
                            alert('Invalid username or password');
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
