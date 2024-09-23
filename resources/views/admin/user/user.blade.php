@extends('admin.base')

@section('title', 'User controll')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">User Management</h1>

    <!-- Create New user Button -->
    <div class="mt-4">
        <a href="{{ route('admin.user.edit') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add New user</a>
    </div>

    <!-- Display All users -->
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Password</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $item)
            <tr>
                <td class="border px-4 py-2">{{ $item->id }}</td>
                <td class="border px-4 py-2">{{ $item->name }}</td>
                <td class="border px-4 py-2">{{ $item->email }}</td>
                <td class="border px-4 py-2">{{ $item->password }}</td>
                <td class="border px-4 py-2">
                    <!-- Delete Button -->
                    <form action="{{ route('admin.user.edit', $item->id) }}" method="get" style="display:inline;">
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Edit</button>
                    </form>
                    <form action="{{ route('admin.user.edit', $item->id) }}" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    
</div>
@endsection
