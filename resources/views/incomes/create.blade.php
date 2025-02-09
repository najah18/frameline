@extends('layouts.app')

@section('title', 'إضافة دخل جديد')

@section('content')

<h2 class="mb-4">إضافة دخل جديد</h2>

<form action="{{ route('incomes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>الاسم</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>الوصف</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label>المبلغ</label>
        <input type="number" name="amount" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>التاريخ</label>
        <input type="date" name="income_date" class="form-control" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
    </div>
    <div class="mb-3">
        <label>الصورة</label>
        <input type="file" name="image" class="form-control" accept="image/*">
    </div>
    <button type="submit" class="btn btn-success">حفظ</button>
</form>

@endsection
