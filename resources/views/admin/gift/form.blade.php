<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add new gift codes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#codes-list">Список кодов</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#codes-files">Добавить файлы кодов</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="codes-list">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <form action="{{ route('admin-gift-form-post') }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="gift-codes-type-id">Выберите тип подарков: </label>
                                    <select name="type_id" class="form-control" id="gift-codes-type-id" required>
                                        @foreach($giftTypes as $type)
                                            <option class="form-control" value="{{ $type->id }}">
                                                {{ $type->getTypeListName() }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="gift-codes-textarea">Введите коды подарков с пинами через запятую: </label>
                                    <textarea
                                        name="codes"
                                        class="form-control"
                                        id="gift-codes-textarea"
                                        placeholder="@пример: 9152125125pin1010, 12512512515pin2020"
                                        rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Отправить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="codes-files">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <form action="{{ route('download-gift-images') }}" class="dropzone" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="gift-codes-type-id">Выберите тип подарков: </label>
                                    <select name="type_id" class="form-control" id="gift-codes-type-id" required>
                                        @foreach($giftTypes as $type)
                                            <option class="form-control" value="{{ $type->id }}">{{ $type->title }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="gift-codes-textarea">Загрузите файлы: </label>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Отправить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
