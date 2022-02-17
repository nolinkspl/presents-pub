<?php
    /**
     * @var \App\Models\GiftType $giftType
     */
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gift type editing') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin-gift-type-save') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" value="{{ $giftType->id }}">
                        <div class="form-group">
                            <label>Название(без пробелов)
                                <input name="name"
                                       class="form-control"
                                       value="{{ $giftType->name }}"
                                       required>
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Заголовок
                                <input name="title"
                                       class="form-control"
                                       value="{{ $giftType->title }}"
                                       type="text">
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Описание (Инструкция для применения)
                                <textarea name="description"
                                          class="form-control"
                                          type="text">{{ $giftType->description }}</textarea>
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Стоимость (в баллах)
                                <textarea name="cost"
                                          class="form-control"
                                          type="text">{{ $giftType->cost }}</textarea>
                            </label>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input name="is_vip" class="form-check-input" type="checkbox" value="" id="flexCheckChecked" {{ $giftType->is_vip ? "checked" : ""  }} >
                                <label class="form-check-label" for="flexCheckChecked">
                                    VIP
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
