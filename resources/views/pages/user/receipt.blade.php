<div id="PrintableReciept">
    <header>
        {{-- header --}}
        <h1>Bubble Bob</h1>
        <div>
            <ul>
                {{-- <li>Operated By:</li> --}}
                {{-- <li>VAT Registered TIN:</li> --}}
                {{-- <li>Address: </li> --}}
                {{-- <li>PERMIT#:</li> --}}
                {{-- <li>PTU Date Effectivity:</li> --}}
                {{-- <li>Expiry:</li> --}}
                {{-- <li>POS S/N:</li> --}}
                {{-- <li>MIN:</li> --}}
            </ul>
        </div>
        <h4>OFFICIAL RECEIPT</h4>
    </header>
    <main>
        <section id="Tdetails" class="text-left">
            <h5 class="text-center">Transaction Details</h5>
            <hr>
            @php
                date_default_timezone_set('Asia/Manila');
                $d = new DateTime;
            @endphp
            <div class="row">
                {{-- Date Row --}}
                <div class="col s6">
                    <b>
                        Date Time:
                    </b>
                </div>
                <div class="col s6 text-end">
                    {{ $d->format('Y-m-d h:i:s') }}
                </div>
                {{-- OR Number Row --}}
                {{-- <div class="col s6">
                    <b>
                        OR #:
                    </b>
                </div>
                <div class="col s6 text-end">
                    <span id="or-number">0000</span>
                </div> --}}
            </div>
            {{-- WASH service Row --}}
            <b>WASH</b>
            <div class="row">
                <div class="col s6">
                    <b id="wash-service-name">
                        ServiceName:
                    </b>
                </div>
                <div class="col s6 text-end">
                    <span id="wash-service-price">Price</span>
                </div>
            </div>
            {{-- Dry Service Row --}}
            <b>DRY</b>
            <div class="row">
                <div class="col s6">
                    <b id="dry-service-name">
                        ServiceName:
                    </b>
                </div>
                <div class="col s6 text-end">
                    <span id="dry-service-price">Price</span>
                </div>
            </div>
            {{-- Additional Services --}}
            <b>ADDITIONALS</b>
            <div class="row" id="additionals">
                
            </div>
            {{-- Show Line --}}
            <hr>
            <div class="row">
                {{-- Total --}}
                <div class="col s6">
                    <b>
                        TOTAL:
                    </b>
                </div>
                <div class="col s6 text-end">
                    <span id="total">100.00</span>
                </div>
                {{-- Customer Cash --}}
                <div class="col s6">
                    <b>
                        CASH:
                    </b>
                </div>
                <div class="col s6 text-end">
                    <span id="cash">100.00</span>
                </div>
                {{-- Customer Change --}}
                <div class="col s6">
                    <b>
                        CHANGE:
                    </b>
                </div>
                <div class="col s6 text-end">
                    <span id="change">100.00</span>
                </div>
            </div>
            <hr>
            
        </section>
    </main>
    <footer class="text-left">
            <div class="row">
                {{-- Staff Name --}}
                <div class="col s6">
                    <b>
                        Staff:
                    </b>
                </div>
                <div class="col s6 text-end">
                    <span id="staff-name">Dummy Name</span>
                </div>
                {{-- Customer Name --}}
                <div class="col s6">
                    <b>
                        Customer:
                    </b>
                </div>
                <div class="col s6 text-end">
                    <span id="customer-name">Dummy Name</span>
                </div>
            </div>
    </footer>
</div>