<!doctype html>
<html lang="en">
<head>
    @include('admin.include.head')
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">

    @include('admin.include.header')

    @include('admin.include.sidebar')

    @section('admin_content')
        @show

</div>
@include('admin.include.footer')
</body>
</html>