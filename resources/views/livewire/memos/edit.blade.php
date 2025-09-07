<?php

use function Livewire\Volt\{state, rules, mount};
use App\Models\Memo;

state([
    'memo' => null,
    'title' => '',
    'body' => '',
]);

rules([
    'title' => 'required|max:50',
    'body' => 'required|max:2000',
]);

mount(function (Memo $memo) {
    $this->memo = $memo;
    $this->title = $memo->title;
    $this->body = $memo->body;
});

$save = function () {
    $validated = $this->validate();

    $this->memo->update($validated);

    session()->flash('success', 'メモを更新しました。');

    $this->redirect('/memos/' . $this->memo->id);
};

?>

<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
    <h1 class="text-2xl font-bold text-blue-600 mb-6">メモを編集</h1>
    <form wire:submit="save" class="space-y-6">
        <div>
            <label for="title" class="block text-base font-medium text-blue-600">
                タイトル
            </label>
            <input type="text" wire:model="title" id="title"
                class="mt-2 block w-full rounded-lg border-gray-200 bg-white px-4 py-3 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-base"
                placeholder="タイトルを入力してください">
            @error('title')
                <p class="mt-2 text-sm font-medium text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="body" class="block text-base font-medium text-blue-600">
                本文
            </label>
            <textarea wire:model="body" id="body" rows="6"
                class="mt-2 block w-full rounded-lg border-gray-200 bg-white px-4 py-3 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-base"
                placeholder="本文を入力してください"></textarea>
            @error('body')
                <p class="mt-2 text-sm font-medium text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end gap-4">
            <a href="/memos/{{ $memo->id }}"
                class="inline-flex items-center justify-center rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-base font-medium text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                キャンセル
            </a>
            <button type="submit"
                class="inline-flex items-center justify-center rounded-lg border border-transparent bg-blue-600 px-5 py-2.5 text-base font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                更新
            </button>
        </div>
    </form>
</div>
