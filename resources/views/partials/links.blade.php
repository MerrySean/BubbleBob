<div class="sidenav sidenav-fixed blue darken-4" style="height:100%;width: 280px;"> 
    <div class="collection">
        <a href="{{ route('admin.dashboard') }}" class="collection-item {{ is_route('admin.dashboard','active') }}">Dashboard</a>
        <a href="{{ route('admin.users') }}" class="collection-item {{ is_route('admin.users','active') }}">Users</a>
        <a href="{{ route('admin.users.logs') }}" class="collection-item {{ is_route('admin.users.logs','active') }}">User Log</a>
        <a href="{{ route('admin.products') }}" class="collection-item {{ is_route('admin.products','active') }}">Products</a>
        <a href="{{ route('admin.PettyCash') }}" class="collection-item {{ is_route('admin.PettyCash','active') }}">Petty Cash</a>
        <a href="{{ route('admin.sales') }}" class="collection-item {{ is_route('admin.sales','active') }}">View Sales</a>
        <a href="{{ route('admin.reports') }}" class="collection-item {{ is_route('admin.reports','active') }}">Reports</a>
    </div> 
</div>