<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stripe Payment Form</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="mt-3">Stripe Payment Form</h1>
        <div class="row mt-3">
            <div class="col-md-6">
                <form action="/session" method="POST">
                    @csrf <!-- Use Laravel's CSRF token -->
                    <div class="form-group">
                        <img width="100%" height="100%" src="{{ asset('1.PNG') }}" alt="" class="img-fluid">
                        <!-- The "img-fluid" class makes the image responsive and fit the container -->
                    </div>
                    <div class="form-group">
                        <label for="name">Product Name:</label>
                        <input type="text" value="apple" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" value="3" name="price" id="price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
