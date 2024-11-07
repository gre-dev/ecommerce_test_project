<footer class="bg-white border-t mt-auto">
    <div class="container py-12">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="footer-brand mb-4">
                    <div class="flex items-center gap-3">
                        <div class="rounded-lg bg-gradient-to-tr from-primary to-accent p-2">
                            <i class="fas fa-shopping-bag text-white"></i>
                        </div>
                        <span
                            class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent font-bold text-xl">
                            {{ config('app.name') }}
                        </span>
                    </div>
                </div>
                <p class="text-gray-500 mb-4">
                    نحن نقدم أفضل المنتجات بأفضل الأسعار. تسوق معنا واستمتع بتجربة تسوق فريدة.
                </p>
                <div class="social-links d-flex gap-3">
                    <a href="#" class="btn btn-light rounded-circle">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="btn btn-light rounded-circle">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="btn btn-light rounded-circle">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-2">
                <h5 class="footer-title mb-4">روابط سريعة</h5>
                <ul class="list-unstyled footer-links">
                    <li><a href="#">الرئيسية</a></li>
                    <li><a href="#">المنتجات</a></li>
                    <li><a href="#">التصنيفات</a></li>
                    <li><a href="#">من نحن</a></li>
                    <li><a href="#">اتصل بنا</a></li>
                </ul>
            </div>

            <div class="col-lg-3">
                <h5 class="footer-title mb-4">معلومات التواصل</h5>
                <ul class="list-unstyled footer-contact">
                    <li class="mb-3">
                        <i class="fas fa-map-marker-alt me-2 text-primary"></i>
                        شارع الملك فهد، الرياض، المملكة العربية السعودية
                    </li>
                    <li class="mb-3">
                        <i class="fas fa-phone-alt me-2 text-primary"></i>
                        +966 123 456 789
                    </li>
                    <li class="mb-3">
                        <i class="fas fa-envelope me-2 text-primary"></i>
                        info@example.com
                    </li>
                </ul>
            </div>

            <div class="col-lg-3">
                <h5 class="footer-title mb-4">النشرة البريدية</h5>
                <p class="text-gray-500 mb-4">اشترك في نشرتنا البريدية للحصول على آخر العروض والتحديثات</p>
                <form class="newsletter-form">
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="البريد الإلكتروني">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <hr class="my-4">

        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <p class="mb-0 text-gray-500">
                    &copy; {{ date('Y') }} {{ config('app.name') }}. جميع الحقوق محفوظة
                </p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <div class="payment-methods">
                    <i class="fab fa-cc-visa mx-2"></i>
                    <i class="fab fa-cc-mastercard mx-2"></i>
                    <i class="fab fa-cc-paypal mx-2"></i>
                    <i class="fab fa-cc-apple-pay mx-2"></i>
                </div>
            </div>
        </div>
    </div>
</footer>
