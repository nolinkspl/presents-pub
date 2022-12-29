<?php
/**
 * @var \App\Models\User[] $users
 */
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="form-group">
                <a href="{{ route('users.create') }}" class="btn btn-primary">Создать пользователя</a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 bg-grey border-b border-gray-200 row">
                    <div class="col-md-1">#</div>
                    <div class="col-md-3">Name</div>
                    <div class="col-md-3">Email</div>
                    <div class="col-md-3">Role</div>
                    <div class="col-md-2">Actions</div>
                </div>
                @foreach ($users as $user)
                <div class="p-1 bg-white border-b border-gray-200 row">
                    <div class="col-md-1">{{ $user->id }}</div>
                    <div class="col-md-3">{{ $user->name }}</div>
                    <div class="col-md-3">{{ $user->email }}</div>
                    <div class="col-md-3">{{ $user->role }}</div>
                    <div class="col-md-1">
                        <a href="{{ route('users.edit', ['id' => $user->id]) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>

                </div>
                @endforeach
            </div>
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>

