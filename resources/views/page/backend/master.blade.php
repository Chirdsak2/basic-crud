@push('styles')
<style>
    .zoom-on-hover {
        display: block;
        overflow: hidden;
        transition: transform 0.2s ease-in-out;
    }

    .zoom-on-hover img {
        width: 100%;
        height: auto;
    }

    .zoom-on-hover:hover {
        transform: scale(1.05);
    }
</style>
@endpush


@include("layouts.header")

@include("components.navbar")

@include("page.backend.master-management")

@include("layouts.footer")