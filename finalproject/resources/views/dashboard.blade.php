<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <title>Document</title>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        {{-- <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="container">
            <label>Menu</label>
            <a href="{{ route('addItemForm') }}"><button class="add-item">Add item</button></a>
            
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Item Name</th>
                        <th>Item Picture</th>
                        <th>Item Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tableData as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->item_name }}</td>
                            <td class="picture_container">
                                @if ($row->item_picture)
                                    <img src="{{ asset('storage/item_pictures/' . $row->item_picture) }}" alt="{{ $row->item_name }}" class="picture">
                                @else
                                    No Picture
                                @endif
                            </td>
                            <td>{{ $row->item_price }}</td>
                            
                                <td>
                                    <a href="{{  url('edit/'. $row->id) }}">Edit</a>
                                </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-app-layout>
</body>
</html>