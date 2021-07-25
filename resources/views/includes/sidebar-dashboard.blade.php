<div class="border-right" id="sidebar-wrapper">
    <div class="sidebar-heading text-center">
        <img src="/images/dashboard-logo.svg" alt="" class="my-4" />
    </div>
    <div class="list-group list-group-flush">
        <a href="{{route('dashboard')}}" class="list-group-item list-group-item-action {{request()->is('dashboard') ? 'active' : ''}}">Dashboard</a>
        <a href="{{route('dashboard-products')}}" class="list-group-item list-group-item-action {{request()->is('dashboard/products*') ? 'active' : ''}}"">Product</a>
        <a href="{{route('dashboard-transaction')}}" class="list-group-item list-group-item-action {{request()->is('dashboard/transaction*') ? 'active' : ''}}">Transaction</a>
        <a href="{{route('dashboard-store-setting')}}" class="list-group-item list-group-item-action {{request()->is('dashboard/setting*') ? 'active' : ''}}">Store Setting</a>
        <a href="{{route('dashboard-account-setting')}}" class="list-group-item list-group-item-action {{request()->is('dashboard/account*') ? 'active' : ''}}">Account</a>
    </div>
</div>
