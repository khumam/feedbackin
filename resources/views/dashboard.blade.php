<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-xl font-medium">Your products</h1>
        <p class="text-sm text-slate-400">You can update your feedback form on the project detail page.</p>
    </div>
    <div class="max-w-7xl mx-auto mt-6 px-4 sm:px-6 lg:px-8 gap-4 grid grid-cols-4">
        @foreach($projects as $project)
        <a href="{{ route('project.show', $project) }}">
            <div class="bg-white shadow hover:bg-slate-50 w-full h-[200px] flex flex-col justify-between p-6 cursor-pointer gap-4 rounded">
                <div>
                    <h1 class="font-medium text-xl">{{ $project->name }}</h1>
                    <p class="text-gray-400 line-clamp-2 text-sm mt-1">{{ $project->desc }}</p>
                </div>
                <div class="mt-3">
                    <span class="bg-emerald-300 text-sm rounded p-2">{{ \Str::ucfirst($project->status) }}</span>
                </div>
            </div>
        </a>
        @endforeach
        <a href="{{ route('project.create') }}">
            <div class="bg-white shadow hover:bg-slate-50 w-full h-[200px] flex flex-col items-center justify-center cursor-pointer gap-4 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <h1>Add your new project or product</h1>
            </div>
        </a>
    </div>
</x-app-layout>
