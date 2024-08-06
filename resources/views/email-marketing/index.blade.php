@extends('layouts.app')

@push('datatable-styles')
    @include('sections.datatable_css')
@endpush

@section('filter-section')

@endsection

@php
$addProductPermission = user()->permission('add_product');
$addOrderPermission = user()->permission('add_order');
@endphp

@section('content')
    <!-- CONTENT WRAPPER START -->
 
    <!-- CONTENT WRAPPER END -->

    <iframe src="https://em.clientbud.com/login?email={{user()->email}}&password=mhCSaw%MSLqc" style="width: 100%; height: 100vh;" frameborder="0"></iframe>

@endsection

@push('scripts')
    <script>
    </script>
@endpush
