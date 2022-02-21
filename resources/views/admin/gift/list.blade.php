<?php
/**
 * @var \App\Models\Gift[] $gifts
 */
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gift List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="form-group">
                @if (Auth::user()->role === 'admin')
                <a href="{{ route('admin-gift-form') }}" class="btn btn-primary">Добавить коды</a>
                @endif
                @if (Auth::user()->role === 'admin')
                <a href="{{ route('admin-gift-delete-all') }}" class="btn btn-danger">Удалить все</a>
                @endif

                <a class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Скачать
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a href="{{ route('download-gifts-excel', ['format' => \Maatwebsite\Excel\Excel::XLSX]) }}"
                           class="dropdown-item">Excel</a>
                        <a href="{{ route('download-gifts-excel', ['format' => \Maatwebsite\Excel\Excel::CSV]) }}"
                           class="dropdown-item">CSV</a>
                        <a href="{{ route('download-gifts-excel', ['format' => \Maatwebsite\Excel\Excel::HTML]) }}"
                           class="dropdown-item">HTML</a>
                    </div>
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 bg-grey border-b border-gray-200 row">
                    <div class="col-md-1">#</div>
                    <div class="col-md-3">Type</div>
                    <div class="col-md-2">Code</div>
                    <div class="col-md-1">Pin</div>
                    <div class="col-md-2">Used at</div>
                    <div class="col-md-2">Invite info</div>
                    <div class="col-md-1"></div>
                </div>
                @foreach ($gifts as $gift)
                <div class="p-1 bg-white border-b border-gray-200 row">
                    <div class="col-md-1">{{ $gift->id }}</div>
                    <div class="col-md-3">{{ $gift->getType()->getTypeListName() }})</div>
                    <div class="col-md-2">{{ $gift->getCode() }}</div>
                    <div class="col-md-1">{{ $gift->getPin() }}</div>
                    <div class="col-md-2">{{ $gift->used_at }}</div>
                    <div class="col-md-2">{{ $gift->getInviteInfo() }}</div>
                    <div class="col-md-1">
                        @if (Auth::user()->role === 'admin')
                        <a href="{{ route('admin-gift-delete', ['id' => $gift->id]) }}">
                            <i class="fa fa-trash"></i>
                        </a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            {{ $gifts->links() }}
        </div>
    </div>
</x-app-layout>
