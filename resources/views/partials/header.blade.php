<header class="fixed w-100 top-0 left-0 right-0 z-50">
    <nav class="navbar navbar-expand-lg backdrop-blur-md bg-white/80 border-b border-gray-100">
        <div class="container">
            <a class="navbar-brand" href="#">
                <div class="flex items-center gap-3">
                    <div class="rounded-lg bg-gradient-to-tr from-primary to-accent p-2">
                        <i class="fas fa-shopping-bag text-white"></i>
                    </div>
                    <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent font-bold">
                        {{ config('app.name') }}
                    </span>
                </div>
            </a>

            <button class="navbar-toggler border-0 hover:bg-gray-100 rounded-lg p-2" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link px-4 py-2 rounded-lg hover:bg-gray-100 transition-all"
                            href="{{ route('products.index') }}">
                            <i class="fas fa-home me-2"></i>الرئيسية
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link d-flex align-items-center gap-2" href="#" data-bs-toggle="dropdown">
                            <div class="nav-icon-wrapper">
                                <i class="fas fa-cube"></i>
                            </div>
                            <span>إدارة المنتجات</span>
                        </a>

                        <div class="admin-dropdown dropdown-menu">
                            <div class="admin-dropdown-header">
                                <h5>إدارة المنتجات</h5>
                                <p>قم بإدارة منتجات متجرك بسهولة</p>
                            </div>

                            <div class="admin-dropdown-grid">
                                <a href="{{ route('products.create') }}" class="admin-dropdown-item">
                                    <div class="admin-dropdown-icon bg-success-subtle">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                    <div class="admin-dropdown-content">
                                        <h6>إضافة منتج</h6>
                                        <p>إضافة منتج جديد للمتجر</p>
                                    </div>
                                </a>

                                <div class="admin-dropdown-divider"></div>

                                <div class="admin-dropdown-subheader">
                                    <h6>تعديل حالة المنتجات</h6>
                                </div>

                                <div class="products-list">
                                    @foreach ($products as $product)
                                        <a href="{{ route('products.status.edit', $product->id) }}"
                                            class="product-item">
                                            <div
                                                class="product-status {{ $product->status === 'active' ? 'active' : 'inactive' }}">
                                                <i class="fas fa-circle"></i>
                                            </div>
                                            <span class="product-name">{{ $product->name }}</span>
                                            <span
                                                class="status-badge {{ $product->status === 'active' ? 'active' : 'inactive' }}">
                                                {{ $product->status === 'active' ? 'نشط' : 'غير نشط' }}
                                            </span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-4 py-2 rounded-lg hover:bg-gray-100 transition-all" href="#">
                            <i class="fas fa-th-large me-2"></i>التصنيفات
                        </a>
                    </li>
                </ul>

                <div class="d-flex gap-3 align-items-center">
                    <form action="{{ route('products.search') }}" method="post" class="search-form">
                        @csrf
                        <div class="input-group">
                            <input type="search" name="query"
                                class="form-control border-end-0 bg-gray-50 focus:bg-white transition-all"
                                placeholder="البحث عن منتجات..." value="{{ request('query') }}">
                            <button class="btn btn-light border border-start-0 bg-gray-50" type="submit">
                                <i class="fas fa-search text-gray-400"></i>
                            </button>
                        </div>
                    </form>

                    <div class="vr d-none d-lg-block"></div>

                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-light position-relative">
                            <i class="fas fa-shopping-cart"></i>
                            <span
                                class="position-absolute top-0 start-75 translate-middle badge rounded-pill bg-danger">
                                5
                            </span>
                        </a>

                        @auth
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    <img src="{{ auth()->user()->avatar }}" class="rounded-circle me-2" width="25"
                                        height="25" alt="User Avatar">
                                    {{ auth()->user()->name }}
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end animate slideIn">
                                    <li><a class="dropdown-item" href="#">
                                            <i class="fas fa-user me-2"></i>الملف الشخصي
                                        </a></li>
                                    <li><a class="dropdown-item" href="#">
                                            <i class="fas fa-shopping-bag me-2"></i>طلباتي
                                        </a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form action="#" method="POST">
                                            @csrf
                                            <button class="dropdown-item text-danger">
                                                <i class="fas fa-sign-out-alt me-2"></i>تسجيل الخروج
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <a href="#" class="btn btn-primary">
                                <i class="fas fa-sign-in-alt me-2"></i>تسجيل الدخول
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<div class="mb-5 pt-5"></div>
