@extends('layouts.app')

@section('title', 'قائمة الدخل')

@section('content')

<h2 class="mb-4">قائمة الدخل</h2>
<a href="{{ route('incomes.create') }}" class="btn btn-primary mb-3">إضافة دخل جديد</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>الصورة</th>
            <th>الاسم</th>
            <th>الوصف</th>
            <th>المبلغ</th>
            <th>التاريخ</th>
            <th>الإجراءات</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($incomes as $income)
        <tr>
            <td>
                <img src="{{ Storage::url($income->image) }}" width="50">
            </td>
            <td>{{ $income->name }}</td>
            <td>{{ $income->description }}</td>
            <td>{{ $income->amount }} $</td>
            <td>{{ $income->income_date }}</td>
            <td>
                <a href="{{ route('incomes.edit', $income->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                <form action="{{ route('incomes.destroy', $income->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3" class="text-end"><strong>المجموع الكلي:</strong></td>
            <td><strong>{{ $incomes->sum('amount') }} $</strong></td>
            <td colspan="2"></td>
        </tr>
    </tfoot>
</table>

@endsection
