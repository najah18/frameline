@extends('layouts.app')

@section('title', 'قائمة الفواتير')

@section('content')

<h2 class="mb-4">قائمة الفواتير</h2>
<a href="{{ route('invoices.create') }}" class="btn btn-primary mb-3">إضافة فاتورة جديدة</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>الصورة</th>
            <th>الاسم</th>
            <th>الوصف</th>
            <th>السعر</th>
            <th>التاريخ</th>
            <th>الإجراءات</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($invoices as $invoice)
        <tr>
        <td>
        <img src="{{ Storage::url($invoice->image) }}" width="50">
        </td>
        <td>{{ $invoice->name }}</td>
            <td>{{ $invoice->description }}</td>
            <td>{{ $invoice->price }} $</td>
            <td>{{ $invoice->invoice_date }}</td>
            <td>
                <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                
                <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                </form>
            </td>
        </tr>
        @endforeach
        <tfoot>
        <tr>
            <td colspan="3" class="text-end"><strong>المجموع الكلي:</strong></td>
            <td><strong>{{ $invoices->sum('price') }} $</strong></td>
            <td colspan="2"></td>
        </tr>
    </tfoot>
    </tbody>
</table>

@endsection
