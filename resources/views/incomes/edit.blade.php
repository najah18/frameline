@extends('layouts.app')

@section('title', 'تعديل الدخل')

@section('content')

<h2 class="mb-4">تعديل الدخل</h2>

<form action="{{ route('incomes.update', $income->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>الاسم</label>
        <input type="text" name="name" class="form-control" value="{{ $income->name }}" required>
    </div>

    <div class="mb-3">
        <label>الوصف</label>
        <textarea name="description" class="form-control">{{ $income->description }}</textarea>
    </div>

    <div class="mb-3">
        <label>المبلغ</label>
        <input type="number" name="amount" class="form-control" value="{{ $income->amount }}" required>
    </div>

    <div class="mb-3">
        <label>التاريخ</label>
        <input type="date" name="income_date" class="form-control" value="{{ $income->income_date }}" required>
    </div>

    <div class="mb-3">
        <label>الصورة الحالية</label><br>
        @if($income->image)
            <img src="{{ Storage::url($income->image) }}" width="100" class="mb-2"><br>
        @else
            <p>لا توجد صورة</p>
        @endif
    </div>

    <div class="mb-3">
        <label>تغيير الصورة</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">تحديث</button>
</form>

@endsection
