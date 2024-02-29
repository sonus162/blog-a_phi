@extends('Frontend/main')
@section('wrapper')
    @include('Frontend.pages.home.index')
@endsection
@push('scripts')
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="{{ asset('Frontend/js/home.js')}}"></script>
@endpush
