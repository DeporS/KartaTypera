<x-app-layout>
    <head>
        <link rel="stylesheet" href="/css/friends.css" />
    </head>
    <body>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex items-center">
                            <img src="{{ asset('storage/' . $user->profile_picture_path) }}" alt="Photo" style="width: 200px; height: 200px; object-fit: cover;">
                            
                            <div class="flex justify-between w-full items-center" style="margin-left: 1rem">
                                <div class="flex flex-col">
                                    <strong>{{ $user->name }}</strong>
                                    <p>Dołączył {{ $user->created_at->format('F j, Y') }}</p>
                                </div>
                            
                            </div>
                        </div>
                        <div>
                            <p class="mt-3">{{ $user->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    
</x-app-layout>