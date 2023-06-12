<x-app-layout>
    <x-slot name="header">
        <div class="w-full h-full flex justify-between items-center">
            <div class="flex items-center gap-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mr-10">
                    {{ $project->name }}
                </h2>
                <a href="#">Analytics</a>
                <a href="#">Setting</a>
            </div>
            <div class="flex gap-4">
                <a href="{{ route('project.edit', $project) }}" class="border border-orange-400 font-medium hover:bg-slate-50 active:bg-slate-200 px-3 py-2 text-orange-600 rounded bg-white hover:border-orange-300 active:border-orange-500">Edit</a>
                <button class="bg-emerald-400 font-medium px-3 py-2 rounded hover:bg-emerald-300 text-slate-50 active:bg-emerald-500">Copy feedback page</button>
            </div>
        </div>
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mt-6 p-5 container mx-auto bg-white rounded">
            {{ $project->desc }}
        </div>
    </div>
    <livewire:feedback-form-admin-livewire />
</x-app-layout>
