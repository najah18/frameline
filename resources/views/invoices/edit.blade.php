@extends('layouts.app')

@section('title', isset($invoice) ? 'تعديل الفاتورة' : 'إضافة فاتورة')

@section('content')

<h2 class="mb-4">{{ isset($invoice) ? 'تعديل الفاتورة' : 'إضافة فاتورة' }}</h2>

<form action="{{ isset($invoice) ? route('invoices.update', $invoice->id) : route('invoices.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($invoice))
        @method('PUT')
    @endif

    <div class="mb-3">
        <label class="form-label">الصورة</label>
        <input type="file" name="image" class="form-control">
        @if(isset($invoice) && $invoice->image)
            <img src="{{ asset($invoice->image) }}" width="100" class="mt-2">
        @endif
    </div>

    <div class="mb-3">
        <label class="form-label">الاسم</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $invoice->name ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">الوصف</label>
        <textarea name="description" class="form-control">{{ old('description', $invoice->description ?? '') }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">السعر</label>
        <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $invoice->price ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">التاريخ</label>
        <input type="date" name="invoice_date" class="form-control" value="{{ old('invoice_date', $invoice->invoice_date ?? '') }}" required>
    </div>

    <button type="submit" class="btn btn-success">{{ isset($invoice) ? 'تحديث' : 'إضافة' }}</button>
    <a href="{{ route('invoices.index') }}" class="btn btn-secondary">إلغاء</a>
</form>

@endsection
