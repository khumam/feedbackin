<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add new project or product') }}
        </h2>
        <p class="text-gray-500 text-sm mt-1">In this section, you can add your project or product detail so we can build the feedback form for you</p>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-6 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2">
            <form action="{{ route('project.store') }}" method="POST">
                @csrf
                <div class="bg-white shadow w-full gap-4 rounded p-5">
                    <div class="mb-3 flex flex-col">
                        <label for="name" class="mb-2 text-slate-600">Product's name</label>
                        <input type="text" id="name" name="name" class="bg-slate-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 @error('name') border-rose-600 @enderror mb-2" required placeholder="Your project or product's name" value="{{ old('name') }}">
                        @error('name')
                        <span class="text-sm text-rose-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 flex flex-col">
                        <label for="main_url" class="mb-2 text-slate-600">Product's homepage</label>
                        <input type="text" id="main_url" name="main_url" class="bg-slate-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 @error('main_url') border-rose-600 @enderror mb-2" required placeholder="https://yourproduct.com" value="{{ old('main_url') }}">
                        @error('main_url')
                        <span class="text-sm text-rose-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 flex flex-col">
                        <label for="redirect_url" class="mb-2 text-slate-600">Product's redirect page</label>
                        <input type="text" id="redirect_url" name="redirect_url" class=" bg-slate-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 @error('redirect_url') border-rose-600 @enderror mb-2" required placeholder="https://yourproduct.com/feedback/success" value="{{ old('redirect_url') }}">
                        @error('redirect_url')
                        <span class="text-sm text-rose-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 flex flex-col">
                        <label for="desc" class="mb-2 text-slate-600">Product's description</label>
                        <textarea type="text" id="desc" name="desc" class=" bg-slate-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 @error('desc') border-rose-600 @enderror mb-2" rows="4" required placeholder="My product is">{{ old('desc') }}</textarea>
                        @error('desc')
                        <span class="text-sm text-rose-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 flex flex-col">
                        <button class="bg-slate-700 rounded text-slate-50 py-3 hover:bg-slate-800 active:bg-slate-600">Add new product</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
