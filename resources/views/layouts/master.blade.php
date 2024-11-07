<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #3b82f6;
            --accent-color: #60a5fa;
        }

        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f8fafc;
        }

        .navbar {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.9);
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .card {
            border: none;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            border: none;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, var(--secondary-color), var(--accent-color));
            transition: 0.5s;
            z-index: -1;
        }

        .btn-primary:hover::before {
            left: 0;
        }

        .product-image-placeholder {
            aspect-ratio: 1;
            background: linear-gradient(45deg, #f1f5f9, #e2e8f0);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: #94a3b8;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        /* Custom Animations */
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .float-animation {
            animation: float 3s ease-in-out infinite;
        }

        /* Loading Skeleton */
        .skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% {
                background-position: 200% 0;
            }

            100% {
                background-position: -200% 0;
            }
        }

        /* Header Styles */
        .navbar.scrolled {
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        .nav-link {
            position: relative;
        }

        .navbar {
            z-index: 1000 !important;
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--primary-color);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* Footer Styles */
        .footer-title {
            position: relative;
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        footer {
            padding-block-end: 25px;
        }

        .footer-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background: var(--primary-color);
        }

        .footer-links a {
            color: #6b7280;
            text-decoration: none;
            transition: all 0.3s ease;
            display: block;
            padding: 5px 0;
        }

        .footer-links a:hover {
            color: var(--primary-color);
            transform: translateX(5px);
        }

        .social-links a {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-3px);
        }

        .newsletter-form .form-control {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .newsletter-form .btn {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        .payment-methods i {
            font-size: 24px;
            color: #6b7280;
            transition: all 0.3s ease;
        }

        .payment-methods i:hover {
            color: var(--primary-color);
        }

        .dropdown-submenu {
            position: absolute;
            left: 100%;
            top: 0;
        }

        .dropdown-item:hover>.dropdown-submenu {
            display: block;
        }

        .dropdown-item.dropdown-toggle::after {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }

        .mega-dropdown-menu {
            padding: 2rem 0;
            width: 100%;
            border: none;
            border-radius: 1rem;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            margin-top: 1rem;
        }

        .menu-block {
            padding: 1.5rem;
            border-radius: 1rem;
            background: linear-gradient(145deg, #ffffff, #f5f5f5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .menu-block:hover {
            transform: translateY(-5px);
        }

        .menu-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            background: linear-gradient(45deg, var(--primary-color), var(--accent-color));
            color: white;
            margin-bottom: 1.5rem;
        }

        .products-status-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1rem;
            max-height: 400px;
            overflow-y: auto;
            padding-right: 1rem;
        }

        .product-status-card {
            padding: 1rem;
            border-radius: 0.75rem;
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .product-status-card:hover {
            background: linear-gradient(145deg, #ffffff, #f8f9fa);
            transform: translateX(-5px);
        }

        .product-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: #f8f9fa;
            color: var(--primary-color);
        }

        .btn-hover-float {
            transition: all 0.3s ease;
        }

        .btn-hover-float:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(var(--primary-rgb), 0.3);
        }

        .dropdown-icon {
            transition: transform 0.3s ease;
        }

        .show .dropdown-icon {
            transform: rotate(180deg);
        }

        /* Scrollbar Styling */
        .products-status-grid::-webkit-scrollbar {
            width: 6px;
        }

        .products-status-grid::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .products-status-grid::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }

        .products-status-grid::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .nav-icon-wrapper {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background: linear-gradient(45deg, var(--primary-color), var(--accent-color));
            color: white;
        }

        .admin-dropdown {
            min-width: 320px;
            padding: 1rem;
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            background: white;
        }

        .admin-dropdown-header {
            padding: 0.5rem 1rem 1rem;
            border-bottom: 1px solid #eee;
            margin-bottom: 1rem;
        }

        .admin-dropdown-header h5 {
            margin: 0;
            font-weight: 600;
            color: #333;
        }

        .admin-dropdown-header p {
            margin: 0.5rem 0 0;
            font-size: 0.875rem;
            color: #666;
        }

        .admin-dropdown-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            border-radius: 12px;
            text-decoration: none;
            color: inherit;
            transition: all 0.3s ease;
        }

        .admin-dropdown-item:hover {
            background: #f8f9fa;
            transform: translateX(-5px);
        }

        .admin-dropdown-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            font-size: 1.25rem;
        }

        .admin-dropdown-divider {
            height: 1px;
            background: #eee;
            margin: 1rem 0;
        }

        .admin-dropdown-subheader {
            padding: 0.5rem 1rem;
        }

        .admin-dropdown-subheader h6 {
            margin: 0;
            color: #666;
            font-size: 0.875rem;
        }

        .products-list {
            max-height: 300px;
            overflow-y: auto;
            margin: 0 -1rem;
            padding: 0 1rem;
        }

        .product-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            text-decoration: none;
            color: inherit;
            transition: all 0.2s ease;
        }

        .product-item:hover {
            background: #f8f9fa;
        }

        .product-status {
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
        }

        .product-status.active {
            background: #d1fae5;
            color: #059669;
        }

        .product-status.inactive {
            background: #fee2e2;
            color: #dc2626;
        }

        .product-status i {
            font-size: 0.625rem;
        }

        .product-name {
            flex: 1;
            font-size: 0.875rem;
        }

        .status-badge {
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
        }

        .status-badge.active {
            background: #d1fae5;
            color: #059669;
        }

        .status-badge.inactive {
            background: #fee2e2;
            color: #dc2626;
        }

        /* تخصيص شريط التمرير */
        .products-list::-webkit-scrollbar {
            width: 4px;
        }

        .products-list::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .products-list::-webkit-scrollbar-thumb {
            background: #ddd;
            border-radius: 10px;
        }

        .products-list::-webkit-scrollbar-thumb:hover {
            background: #ccc;
        }

        .product-mini-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: linear-gradient(45deg, var(--primary-color), var(--accent-color));
            color: white;
            font-size: 1rem;
        }

        .table th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
        }

        .table td {
            vertical-align: middle;
        }

        .btn-light {
            background: #f8f9fa;
            border: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .btn-light:hover {
            background: #e9ecef;
            transform: translateY(-1px);
        }
    </style>
    @stack('styles')
</head>

<body>
    @include('partials.header')

    <div id="notifications" class="position-fixed top-0 end-0 p-3" style="z-index: 1100">
        @if (session('success'))
            <div class="toast show" role="alert">
                <div class="toast-header bg-success text-white">
                    <i class="fas fa-check-circle me-2"></i>
                    <strong class="me-auto">نجاح</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
        @endif
    </div>

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="position-fixed top-0 end-0 p-3" style="z-index: 1100">
            <div class="toast show" role="alert">
                <div class="toast-header bg-danger text-white">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <strong class="me-auto">خطأ</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
                </div>
                <div class="toast-body">
                    <ul class="list-unstyled mb-0">
                        @foreach ($errors->all() as $error)
                            <li class="mb-2">
                                <i class="fas fa-times-circle me-2 text-danger"></i>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <main class="min-vh-100 py-4" style="z-index: 1">
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <script>
        AOS.init({
            duration: 800,
            once: true
        });

        // Initialize toasts
        document.addEventListener('DOMContentLoaded', function() {
            var toastElList = [].slice.call(document.querySelectorAll('.toast'));
            var toastList = toastElList.map(function(toastEl) {
                return new bootstrap.Toast(toastEl, {
                    delay: 3000
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var dropdownItems = document.querySelectorAll('.dropdown-item.dropdown-toggle');

            dropdownItems.forEach(function(item) {
                item.addEventListener('mouseover', function() {
                    var submenu = this.nextElementSibling;
                    if (submenu) {
                        submenu.style.display = 'block';
                    }
                });

                item.parentElement.addEventListener('mouseleave', function() {
                    var submenu = this.querySelector('.dropdown-submenu');
                    if (submenu) {
                        submenu.style.display = 'none';
                    }
                });
            });
        });
    </script>

    @stack('scripts')
</body>

</html>
return new bootstrap.Toast(toastEl, {
delay: 3000
});
});
});
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var dropdownItems = document.querySelectorAll('.dropdown-item.dropdown-toggle');

        dropdownItems.forEach(function(item) {
            item.addEventListener('mouseover', function() {
                var submenu = this.nextElementSibling;
                if (submenu) {
                    submenu.style.display = 'block';
                }
            });

            item.parentElement.addEventListener('mouseleave', function() {
                var submenu = this.querySelector('.dropdown-submenu');
                if (submenu) {
                    submenu.style.display = 'none';
                }
            });
        });
    });
</script>

@stack('scripts')
</body>

</html>
