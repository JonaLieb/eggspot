@extends('layouts.app')

@section('header')
    <h1>Dashboard</h1>
@endsection

@section('content')
    <section class="grid grid-2">
        <div class="card dashboard-hero">
            <div class="dashboard-hero-content">
                <h2 class="eyebrow text-center">Welcome to Eggspot</h2>
                <h3 class="dashboard-title mb-10">Fresh eggs, simple ordering, happy chickens probably.</h3>
                <p class="dashboard-text mb-10">
                    Place your egg orders, keep track of what you’ve requested, and manage everything from one cozy little dashboard.
                </p>
                <div class="dashboard-actions grid grid-2">
                    <a href="{{ route('orders.create') }}" class="button">Place New Order</a>
                    <a href="{{ route('orders.index') }}" class="button button-secondary">View My Orders</a>
                </div>
            </div>
        </div>

        <div class="card orders-card">
            <h2>My Orders</h2>

            <div class="orders-card-body">
                @if(!$recentOrders->isEmpty())
                    @foreach($recentOrders as $order)
                        <div class="mb-3">
                            <strong>{{ $order->reference }}</strong><br>
                            {{ ucfirst($order->status) }}<br>
                            {{ $order->items->count() }} items<br>
                            R{{ number_format($order->total_amount, 2) }}
                        </div>
                    @endforeach
                @else
                    No orders yet. Time to fix that.
                @endif
            </div>
        </div>

        <div class="card stat-card">
            <h3 class="stat-label text-center mb-10">Account</h3>
            <p class="stat-value"><b>Status:</b> Active</p>
            <p class="stat-note">You’re logged in and ready to order.</p>
            <div class="dashboard-actions grid grid-1 mt-10">
                <a href="{{ route('profile.edit') }}" class="button">Edit account</a>
            </div>
        </div>

        <div class="card dashboard-section">
            <h3 class="stat-label text-center mb-10">Getting Started</h3>
            <p class="dashboard-text">
                Eggspot is your place to order eggs without the back-and-forth chaos. Once ordering is wired up, you’ll be able to place requests, track statuses, and see your order history here.
            </p>
        </div>

        {{--    todo: Create table with personal details    --}}
        <div class="card card-wide dashboard-section">
            <div class="grid grid-2">
                <div class="col-left">
                    <h3 class="text-center mb-10">Contact info</h3>
                    <table style="width: 100%">
                        <tr>
                            <td style="width: 25%"></td>
                            <td style="width: 75%"></td>
                        </tr>
                        <tr>
                            <td class="bold">Name:</td>
                            <td>Kayle Roos</td>
                        </tr>
                        <tr>
                            <td class="bold">Cellphone:</td>
                            <td>(+27)12 345 6789</td>
                        </tr>
                        <tr>
                            <td class="bold">Email:</td>
                            <td>kayle@gmail.com</td>
                        </tr>
                        <tr>
                            <td class="bold">Address:</td>
                            <td>Obaro Head Office, Silver lakes, Pretoria, 0081</td>
                        </tr>
                    </table>
                </div>
                <div class="col-right">
                    <h3 class="mb-10 text-center">Banking details</h3>
                    <table style="width: 100%">
                        <tr>
                            <td style="width: 30%"></td>
                            <td style="width: 70%"></td>
                        </tr>
                        <tr>
                            <td class="bold">Account holder:</td>
                            <td>Kayle Roos</td>
                        </tr>
                        <tr>
                            <td class="bold">Account number:</td>
                            <td>{{ random_int(1000000000, 9999999999) }}</td>
                        </tr>
                        <tr>
                            <td class="bold">Account type:</td>
                            <td>Current Account</td>
                        </tr>
                        <tr>
                            <td class="bold">Bank name:</td>
                            <td>Nedbank</td>
                        </tr>
                        <tr>
                            <td class="bold">Branch code:</td>
                            <td>{{ random_int(10000, 99999) }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
