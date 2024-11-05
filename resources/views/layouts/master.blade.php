<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Store App')</title>
    <!-- Add Bootstrap or any other CSS framework if you prefer -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
     <!-- Yield for Page-Specific CSS -->
    @yield('css')

    <style>
        body {
            background-color: #f8f9fa;
        }
        .hero {
            background-color: #007bff;
            color: white;
            padding: 60px 0;
            text-align: center;
        }
        .feature {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            margin: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    
    <!-- Include the Header Partial -->
    @include('partials.header')
    <div class="container mt-4">
        <!-- Main Content Section -->
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center py-3 mt-5">
        <p>&copy; 2024 Laravel App. All rights reserved.</p>
    </footer>

    <!-- JS scripts (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
