<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Charlie Chavez">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Login Page</title>
    <style>
        /* Body styling */
        body {
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Container for the login form */
        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        /* Heading */
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-size: 30px;
            font-weight: bold;
        }

        /* Form styling */
        .form-floating input {
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-floating input:focus {
            border-color: #6c63ff;
            box-shadow: 0 0 8px rgba(108, 99, 255, 0.3);
        }

        .btn-primary {
            background-color: #6c63ff;
            border-color: #6c63ff;
            width: 100%;
            border-radius: 10px;
            padding: 12px;
        }

        .btn-primary:hover {
            background-color: #5a54e1;
            border-color: #5a54e1;
        }

        .btn-info {
            background-color: #5bc0de;
            border-color: #5bc0de;
            width: 100%;
            border-radius: 10px;
            padding: 12px;
            margin-top: 10px;
        }

        .btn-info:hover {
            background-color: #31b0d5;
            border-color: #31b0d5;
        }


        /* Responsive design */
        @media (max-width: 480px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 24px;
            }

            .btn-primary,
            .btn-info {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <form action="login.php" method="POST">
            <!-- Email Input -->
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                <label for="email">Email address</label>
            </div>

            <!-- Password Input -->
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <!-- Register Button -->
        <button onclick="location.href = 'registration.php'" type="button" class="btn btn-info mt-3">Register</button>


    </div>
</body>

</html>
