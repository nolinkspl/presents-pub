<?php
/**
 * @var \App\Models\Invite[] $invites
 */
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Invites List') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="form-group">
                @if (Auth::user()->role === 'admin')
                <a href="{{ route('admin-invite-form') }}" class="btn btn-primary">Добавить коды</a>
                @endif
                <a class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Скачать
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a href="{{ route('download-invites-excel', ['format' => \Maatwebsite\Excel\Excel::XLSX]) }}"
                           class="dropdown-item">Excel</a>
                        <a href="{{ route('download-invites-excel', ['format' => \Maatwebsite\Excel\Excel::CSV]) }}"
                           class="dropdown-item">CSV</a>
                        <a href="{{ route('download-invites-excel', ['format' => \Maatwebsite\Excel\Excel::HTML]) }}"
                           class="dropdown-item">HTML</a>
                    </div>
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 bg-grey border-b border-gray-200 row">
                    <div class="col-md-1">#</div>
                    <div class="col-md-2">Code</div>
                    <div class="col-md-1">Is Vip</div>
                    <div class="col-md-2">GiftInfo</div>
                    <div class="col-md-2">Used</div>
                    <div class="col-md-3">Email</div>
                    <div class="col-md-1"></div>
                </div>
                @foreach ($invites as $invite)
                <div class="p-1 bg-white border-b border-gray-200 row">
                    <div class="col-md-1">{{ $invite->id }}</div>
                    <div class="col-md-2">{{ $invite->code }}</div>
                    <div class="col-md-1">{{ $invite->isVip() }}</div>
                    <div class="col-md-2">{!! $invite->getGiftCode() !!}</div>
                    <div class="col-md-2">{{ $invite->used_at }}</div>
                    <div class="col-md-3">{{ $invite->email }}</div>
                    @if (Auth::user()->role === 'admin')
                    <div class="col-md-1">
                        <a href="{{ route('admin-invite-delete', ['id' => $invite->id]) }}">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>
                    @endif

                </div>
                @endforeach
            </div>
            {{ $invites->links() }}
        </div>
    </div>
</x-app-layout>

