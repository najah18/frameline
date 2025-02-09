<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- القائمة الجانبية -->
            <div class="col-md-3 mt-4">
                <div class="list-group">
                    <a href="{{ route('incomes.index') }}" class="list-group-item list-group-item-action">صفحة الدخل</a>
                    <a href="{{ route('invoices.index') }}" class="list-group-item list-group-item-action">قائمة الفواتير</a>
                </div>
            </div>

            <!-- المحتوى الرئيسي -->
            <div class="col-md-9 mt-4">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
