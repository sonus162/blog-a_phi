<!DOCTYPE html>
<html lang="en">

<head>
    @include('Frontend.elements.meta')
    @stack('css')
    @include('Frontend.elements.css')
</head>
<body>
    <!-- Header -->
    @include('Frontend.elements.header')
    @section('wrapper')
    @show

    @include('Frontend.elements.footer')
    @include('Frontend.elements.script')
    @stack('scripts')

</body>

</html>
