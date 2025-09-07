<?php

use function Livewire\Volt\{state, mount};
use App\Models\Memo;

state(['memo' => null]);

mount(function (Memo $memo) {
    $this->memo = $memo;
});

?>

<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
    <div class="bg-indigo-50 shadow-sm rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4 text-indigo-900">{{ $memo->title }}</h1>

        <div class="prose max-w-none mb-4 text-indigo-800">
            {!! nl2br(e($memo->body)) !!}
        </div>

        <div class="text-sm text-indigo-600">
            作成日: {{ $memo->created_at->format('Y年m月d日 H:i') }}
        </div>
    </div>
</div>
