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
                <a href="{{ route('project.edit', $project) }}" class="border border-orange-700 font-medium hover:bg-orange-800 active:bg-orange-700 px-5 py-2 text-slate-50 rounded bg-orange-500 hover:border-orange-300 active:border-orange-500">Edit</a>
                <button class="bg-emerald-600 border-emerald-700 border font-medium px-5 py-2 rounded hover:bg-emerald-700 text-white active:bg-emerald-800">Open feedback page</button>
            </div>
        </div>
    </x-slot>
    <div class="max-w-7xl mx-auto pt-6 px-4 sm:px-6 lg:px-8">
        <div class="p-5 mx-auto bg-white rounded">
            {{ $project->desc }}
        </div>
    </div>
    <livewire:feedback-form-admin-livewire :projectId="$project->id" />
</x-app-layout>
