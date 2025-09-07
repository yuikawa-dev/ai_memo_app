<?php

use function Livewire\Volt\{state};
use App\Models\Memo;

state([
    'memos' => fn() => Memo::latest()->get(),
]);

?>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="text-2xl font-bold mb-4">メモ一覧</h1>

                <div class="space-y-4">
                    @foreach ($memos as $memo)
                        <div class="p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                            <a href="{{ route('memos.show', $memo) }}" class="block">
                                <h2 class="text-lg font-semibold">{{ $memo->title }}</h2>
                                <p class="text-sm text-gray-600">作成日: {{ $memo->created_at->format('Y年m月d日') }}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
