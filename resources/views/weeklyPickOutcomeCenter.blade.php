<x-app-layout>
    
    <div class="flex-wrap">
        @foreach ($templates as $index => $template)
            
            <div>
                <div class="flex items-center justify-center mt-6">
                    <h2>Tydzień</h2>
                    <span>&nbsp;</span>
                    <p>{{ $template->week }}</p>
                </div>
                <div class="flex items-center justify-center mt-2">
                    @if ($outcomes[$index] === "-")
                    <a href="{{ route('weekly-pick-outcome.show', ['weekly_pick_outcome' => $template->week]) }}">
                        <x-primary-button class="ms-3 mb-3">
                            {{ __('Dodaj') }}
                        </x-primary-button>
                    </a>
                    @else 
                    <x-secondary-button class="ms-3 mb-3">
                        {{ __('Edytuj') }}
                    </x-secondary-button>
                    <x-danger-button class="ms-3 mb-3">
                        {{ __('Usuń') }}
                    </x-danger-button>
                    @endif
                </div>
            </div>
            
            
        @endforeach
    </div>
    
</x-app-layout>