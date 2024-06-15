<?php

use Livewire\Volt\Component;
use App\Models\Todo;
use Illuminate\Support\Facades\Gate;

new class extends Component {
    public Todo $todo;

    public function mount($todoId)
    {
        $todo = Todo::find($todoId);
        $this->authorize('view', $todo);
        $this->todo = Todo::find($todoId);
    }
}; ?>

<div>
    <div wire:transition
        class="flex items-center justify-between p-4 m-auto mb-4 space-x-4 bg-white border border-gray-200 rounded-lg shadow-md">

        <div class="flex-1 text-lg font-medium text-gray-800">
            {{ $todo->name }}
        </div>
        <div class="flex-shrink-0 text-sm text-gray-400">
            Created by {{ $todo->user->name }}
        </div>

        <x-danger-button wire:click='deleteTodo({{ $todo->id }})' class="flex-shrink-0">Delete</x-danger-button>
    </div>
    <a href="{{ route('dashboard') }}" class="text-sm text-gray-400 underline hover:text-gray-600">
        ← Back to All Todos
    </a>
</div>
