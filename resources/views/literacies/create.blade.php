<x-guestLayout>
    <form action="/literacias/store" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="flex flex-col">
            <label for="name" class="font-semibold">Nome:</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-300" 
                value="{{ old('name') }}"
            >
            @error('name')
                <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex flex-col">
            <label for="slug" class="font-semibold">Slug:</label>
            <input 
                type="text" 
                name="slug" 
                id="slug" 
                class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-300" 
                value="{{ old('slug') }}"
            >
            @error('slug')
                <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex flex-col">
            <label for="image" class="font-semibold">Imagem:</label>
            <input 
                type="file" 
                name="image" 
                id="image" 
                class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-300"
            >
            @if(old('image'))
                <span class="text-sm text-gray-500">{{ old('image') }}</span>
            @endif
            @error('image')
                <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex flex-col">
            <label for="description" class="font-semibold">Descrição:</label>
            <textarea 
                name="description" 
                id="description" 
                class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-300" 
                rows="4"
            >{{ old('description') }}</textarea>
            @error('description')
                <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="text-center">
            <x-button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Criar</x-button>
        </div>
    </form>
</x-guestLayout>
