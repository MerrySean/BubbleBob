<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Bubble Bob</title>

        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet"> 

        <link rel="stylesheet" href="/css/app.css">

        <style>
            .d-flex{
                display: flex;
            }
            .d-none {
                display: none !important;
            }
            .d-block {
                display: block !important;
            }
            .flex-column{
                flex-direction: column;
            }
            .min-h-100{
                min-height: 100%;
            }
            .align-content-stretch{
                align-content: stretch;
            }
            .w-100 {
                width: 100%;
            }

            .p-0{
                padding: 0 !important;
            }

            .m-0{
                margin: 0 !important;
            }
        </style>

        @stack('styles')
    </head>
    <body>
        {{-- Master layout --}}
            <header>
                <nav class="blue darken-4">
                    <div class="nav-wrapper">
                        <a href="#!" class="brand-logo" style="margin-left:2rem;">Bubble Bob</a>
                        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                        @auth
                            @yield('auth.navbar')
                        @else
                            @yield('guest.navbar')
                        @endauth
                    </div>
                </nav>
            </header>
            <main style="display: flex;">
                @yield('content')
            </main>
            
            <footer class="page-footer blue darken-4">
                <div class="footer-copyright">
                    <div class="container">
                        <span id="date-part" class=""> time </span>
                        <span id="time-part" class=""> time </span>
                    </div>
                </div>
            </footer>

            {{-- Sidenav --}}
            @auth
                @yield('auth.sidenav')
            @else
                @yield('guest.sidenav')
            @endauth

        {{-- Scripts --}}
        <script src="/js/app.js"></script>
        <script src="/js/notify.js"></script>
        <script>
            // Ajax request all headers have csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).ready(function(){
                M.AutoInit();
                $('select').formSelect();
                $('.sidenav').sidenav();
                $(".dropdown-trigger").dropdown();
                $('.collapsible').collapsible();

                // Restricts input for each element in the set of matched elements to the given inputFilter.
                (function($) {
                $.fn.inputFilter = function(inputFilter) {
                    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
                    if (inputFilter(this.value)) {
                        this.oldValue = this.value;
                        this.oldSelectionStart = this.selectionStart;
                        this.oldSelectionEnd = this.selectionEnd;
                    } else if (this.hasOwnProperty("oldValue")) {
                        this.value = this.oldValue;
                        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                    }
                    });
                };
                }(jQuery));
            });
        </script>
        <script>
            $(document).ready(function() {
                var interval = setInterval(function() {
                    var momentNow = moment();
                    $('#date-part').html(momentNow.format('YYYY MMMM DD') + ' '
                                        + momentNow.format('dddd')
                                        .substring(0,3).toUpperCase());
                    $('#time-part').html(momentNow.format('A hh:mm:ss'));
                }, 100);
            });
        </script>  
        @stack('scripts')
    </body>
</html>
