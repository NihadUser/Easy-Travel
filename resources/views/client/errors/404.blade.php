<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Page Not Found</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="404.css">
    <link rel="stylesheet" href="{{asset('/client/css/errorpage.css')}}">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-12 text-center">
                <div class="error-container">
                    <h1 class="display-1 text-danger">404</h1>
                    <h2 class="display-4">Page Not Found</h2>
                    <p class="lead">Sorry, the page you are looking for does not exist.</p>
                    <a class="btn btn-primary" href="/">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>