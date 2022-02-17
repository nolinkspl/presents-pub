<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add new invite codes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin-invite-form-post') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="invite-category">Выберите категорию приглашения</label>
                            <select name="is_vip" class="form-control" id="invite-category" required>
                                <option class="form-control" value="0">Обычный</option>
                                <option class="form-control" value="1">VIP</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="invite-codes-textarea">Введите коды приглашений через запятую</label>
                            <textarea name="codes" class="form-control" id="invite-codes-textarea" rows="5"></textarea>
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
