<!DOCTYPE html>
<html lang="en">
    <head>
        @include('Backend/elements.head')
    </head>

    <body>
        <div id="wrapper">
            @include('/Backend/elements/topbar')
            @include('/Backend/elements/sidebar')

            {{-- Content --}}
            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        @include('/Backend/elements/breadcumb')
                        @section('wrapper')
                        @show
                    </div>
                </div>
            </div>

        </div>
        <div class="rightbar-overlay"></div>
        @include('Backend/elements.script')
        @stack('scripts')

    </body>
</html>
