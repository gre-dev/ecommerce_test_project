@extends('layouts.master')

@section('title', 'تعديل حالة المنتج')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title h4 mb-4">تعديل حالة المنتج: {{ $product->name }}</h2>

                        <form action="{{ route('products.status.update', $product->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="mb-3">
                                <label class="form-label">الحالة الحالية</label>
                                <div class="badge bg-{{ $product->status === 'active' ? 'success' : 'danger' }} mb-3">
                                    {{ $product->status === 'active' ? 'نشط' : 'غير نشط' }}
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="status" class="form-label">الحالة الجديدة</label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status"
                                    name="status" required>
                                    <option value="active"
                                        {{ old('status', $product->status) === 'active' ? 'selected' : '' }}>
                                        نشط
                                    </option>
                                    <option value="inactive"
                                        {{ old('status', $product->status) === 'inactive' ? 'selected' : '' }}>
                                        غير نشط
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-light">
                                    إلغاء
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    تحديث الحالة
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
