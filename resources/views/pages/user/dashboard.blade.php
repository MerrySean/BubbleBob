@extends('layouts.Auth')

@section('Auth.Content')
    <div class="wrapper d-flex flex-column min-h-100 align-content-stretch w-100">
        {{-- TOP ROW --}}
        <div id="top-row" class="row w-100">
            {{-- WASH --}}
            <div class="col s4">
                <div class="card blue">
                    <div class="card-content">
                        <span class="card-title">WASH</span>
                        @foreach ($wash as $w)    
                            <div class="row" style="margin-bottom:0;">
                                @isset($w[0])
                                    <div class="col s6"  style="padding-right:5px">
                                        <button class="card blue-grey darken-1 card-btn" style="width:100%; border:none;margin: 5px 0;">
                                            <div class="card-content white-text center-align">    
                                                <h5>{{ $w[0]['name'] }}</h5>
                                            </div>
                                        </button>
                                    </div>
                                @endisset
                                @isset($w[1])
                                    <div class="col s6"  style="padding-left:5px">
                                        <button class="card blue-grey darken-1 card-btn" style="width:100%; border:none;margin: 5px 0;">
                                            <div class="card-content white-text center-align">
                                                <h5>{{ $w[1]['name'] }}</h5>
                                            </div>
                                        </button>
                                    </div>
                                @endisset
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- WASH --}}

            {{-- DRY --}}
            <div class="col s4" style="border-left: solid blue; border-right: solid blue;">
                <div class="card blue">
                    <div class="card-content">
                        <span class="card-title">DRY</span>
                        @foreach ($dry as $d)    
                            <div class="row" style="margin-bottom:0;">
                                @isset($d[0])
                                    <div class="col s6"  style="padding-right:5px">
                                        <button class="card blue-grey darken-1 card-btn" style="width:100%; border:none;margin: 5px 0;">
                                            <div class="card-content white-text center-align">    
                                                <h5>{{ $d[0]['name'] }}</h5>
                                            </div>
                                        </button>
                                    </div>
                                @endisset
                                @isset($d[1])
                                    <div class="col s6"  style="padding-left:5px">
                                        <button class="card blue-grey darken-1 card-btn" style="width:100%; border:none;margin: 5px 0;">
                                            <div class="card-content white-text center-align">
                                                <h5>{{ $d[1]['name'] }}</h5>
                                            </div>
                                        </button>
                                    </div>
                                @endisset
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- Dry --}}

            {{-- ADDITIONAL --}}
            <div class="col s4">
                <div class="card blue">
                    <div class="card-content">
                        <span class="card-title">ADDITIONAL</span>
                        @foreach ($additionals as $a)    
                            <div class="row" style="margin-bottom:0;">
                                @isset($a[0])
                                    <div class="col s6"  style="padding-right:5px">
                                        <button class="card blue-grey darken-1 card-btn" style="width:100%; border:none;margin: 5px 0;">
                                            <div class="card-content white-text center-align">    
                                                <h5>{{ $a[0]['name'] }}</h5>
                                            </div>
                                        </button>
                                    </div>
                                @endisset
                                @isset($a[1])
                                    <div class="col s6"  style="padding-left:5px">
                                        <button class="card blue-grey darken-1 card-btn" style="width:100%; border:none;margin: 5px 0;">
                                            <div class="card-content white-text center-align">
                                                <h5>{{ $a[1]['name'] }}</h5>
                                            </div>
                                        </button>
                                    </div>
                                @endisset
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- Additional --}}
        </div>
        {{-- TOP ROW --}}

        {{-- BOTTOM ROW --}}
        <div id="bottom-row" class="row w-100">
            <div class="col s8">
                <div class="card blue">
                    <div class="card-content">
                        <h1>hello</h1>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card blue">
                    <div class="card-content">
                        <h1>hello</h1>
                    </div>
                </div>
            </div>
        </div>
        {{-- BOTTOM ROW --}}
    </div>
@endsection

@push('styles')
    <!-- Styles -->
    <style>
        .card-btn:hover{
            cursor: pointer;
            background-color: #5e8394 !important;
        }
        .card-btn:active{
            background-color: #5a717b !important;
        }
        #top-row .card .card-content {
            padding: 10px;
            border-radius: 0 0 2px 2px;
        }
        
    </style>
@endpush

@push('scripts')
    <script>
        
    </script>
@endpush