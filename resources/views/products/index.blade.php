@extends('layouts.master')

@section('title', 'المنتجات')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">قائمة المنتجات</h2>
                    <a href="{{ route('products.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>إضافة منتج
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="border-0 px-4 py-3">المنتج</th>
                                        <th class="border-0 px-4 py-3">السعر</th>
                                        <th class="border-0 px-4 py-3">المخزون</th>
                                        <th class="border-0 px-4 py-3">الحالة</th>
                                        <th class="border-0 px-4 py-3">تاريخ تحديث الحالة</th>
                                        <th class="border-0 px-4 py-3">الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($products as $product)
                                        <tr>
                                            <td class="px-4 py-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="product-mini-icon me-3">
                                                        <i class="fas fa-box"></i>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">{{ $product->name }}</h6>
                                                        <small
                                                            class="text-muted">{{ Str::limit($product->description, 50) }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3">${{ number_format($product->price, 2) }}</td>
                                            <td class="px-4 py-3">{{ $product->stock }}</td>
                                            <td class="px-4 py-3">
                                                <span
                                                    class="badge bg-{{ $product->status === 'active' ? 'success' : 'danger' }}">
                                                    {{ $product->status === 'active' ? 'نشط' : 'غير نشط' }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3">
                                                @if ($product->status_updated_at)
                                                    {{ Carbon\Carbon::parse($product->status_updated_at)->format('Y-m-d H:i') }}
                                                @else
                                                    غير محدد
                                                @endif
                                            </td>
                                            <td class="px-4 py-3">
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('products.show', $product->id) }}"
                                                        class="btn btn-sm btn-light" title="عرض">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    {{-- <a href="{{ route('products.edit', $product->id) }}"
                                                        class="btn btn-sm btn-light" title="تعديل">
                                                        <i class="fas fa-edit"></i>
                                                    </a> --}}
                                                    <a href="{{ route('products.status.edit', $product->id) }}"
                                                        class="btn btn-sm btn-light" title="تعديل الحالة">
                                                        <i class="fas fa-toggle-on"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-4 text-muted">
                                                <i class="fas fa-box-open display-4 mb-3 d-block"></i>
                                                <h5>لا توجد منتجات متاحة حالياً</h5>
                                                <p class="mb-0">قم بإضافة منتجات جديدة لعرضها هنا</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $products->links() }}
        </div>
    </div>
@endsection
