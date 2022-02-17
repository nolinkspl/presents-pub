<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gift Stat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 bg-grey border-b border-gray-200 row">
                    <div class="col-md-2">#</div>
                    @foreach ($typeNames as $typeName)
                    <div class="col-md-1">{{ $typeName }}</div>
                    @endforeach
                </div>
                <div class="p-1 bg-white border-b border-gray-200 row">
                    <div class="col-md-2">Used</div>
                    @foreach ($usedByType as $type => $value)
                        <div class="col-md-1">{{ $value }} </div>
                    @endforeach
                </div>
                <div class="p-1 bg-white border-b border-gray-200 row">
                    <div class="col-md-2">Unused</div>
                    @foreach ($unusedByType as $type => $value)
                        <div class="col-md-1">{{ $value }} </div>
                    @endforeach
                </div>
                <div class="p-1 bg-white border-b border-gray-200 row">
                    <div class="col-md-2">Total</div>
                    @foreach ($totalByType as $type => $value)
                        <div class="col-md-1">{{ $value }} </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
