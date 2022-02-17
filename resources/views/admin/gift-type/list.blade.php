<?php
/**
 * @var \App\Models\GiftType[] $giftTypes
 */
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gift Type List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="form-group">
                @if (Auth::user()->role === 'admin')
                <a href="{{ route('admin-gift-type-edit') }}" class="btn btn-primary">Добавить типы подарков</a>
                @endif
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 bg-grey border-b border-gray-200 row">
                    <div class="col-md-1">#</div>
                    <div class="col-md-2">Name</div>
                    <div class="col-md-2">Title</div>
                    <div class="col-md-5">Description</div>
                    <div class="col-md-1">Cost</div>
                    <div class="col-md-1">Options</div>
                </div>
                @foreach ($giftTypes as $giftType)
                    <div class="p-1 bg-white border-b border-gray-200 row">
                        <div class="col-md-1">{{ $giftType->id }}</div>
                        <div class="col-md-2">{{ $giftType->name }}</div>
                        <div class="col-md-2">{{ $giftType->title }}</div>
                        <div class="col-md-5">{{ $giftType->description }}</div>
                        <div class="col-md-1">{{ $giftType->cost }}</div>
                        @if (Auth::user()->role === 'admin')
                        <div class="col-md-1">
                            <a href="{{ route('admin-gift-type-edit', ['id' => $giftType->id]) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ route('admin-gift-delete', ['id' => $giftType->id]) }}">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                        @endif
                    </div>
                @endforeach
            </div>
            {{ $giftTypes->links() }}
        </div>
    </div>
</x-app-layout>
