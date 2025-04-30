@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white shadow rounded-lg p-4">
            <p class="text-sm text-gray-500">Today’s Money</p>
            <h2 class="text-xl font-bold text-green-600">$53,000</h2>
            <p class="text-xs text-green-500">+55%</p>
        </div>
        <div class="bg-white shadow rounded-lg p-4">
            <p class="text-sm text-gray-500">Today’s Users</p>
            <h2 class="text-xl font-bold text-blue-600">2,300</h2>
            <p class="text-xs text-green-500">+3%</p>
        </div>
        <div class="bg-white shadow rounded-lg p-4">
            <p class="text-sm text-gray-500">New Clients</p>
            <h2 class="text-xl font-bold text-pink-600">+3,462</h2>
            <p class="text-xs text-red-500">-2%</p>
        </div>
        <div class="bg-white shadow rounded-lg p-4">
            <p class="text-sm text-gray-500">Sales</p>
            <h2 class="text-xl font-bold text-purple-600">$103,430</h2>
            <p class="text-xs text-green-500">+5%</p>
        </div>
    </div>

    {{-- Chart (optional) --}}
    <div class="mt-8 bg-white shadow rounded-lg p-6">
        <h3 class="text-lg font-bold mb-4">Sales Overview</h3>
        <canvas id="salesChart" height="100"></canvas>
    </div>
@endsection
