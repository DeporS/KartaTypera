<x-app-layout>
    <head>
        <style>
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                /* display: none; <- Crashes Chrome on hover */
                -webkit-appearance: none;
                margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
            }

            input[type=number] {
                -moz-appearance:textfield; /* Firefox */
            }

            .bet-button {
                padding: 0.5rem 1rem;
                border-radius: 0.375rem;
                background-color: #e5e7eb; /* gray-200 */
                color: #1f2937; /* gray-800 */
                cursor: pointer;
            }

            .bet-button:hover {
                background-color: #d1d5db; /* gray-300 */
            }

            .selected-bet-button {
                background-color: #3b82f6; /* blue-500 */
                color: #ffffff; /* white */
            }
            
            .selected-bet-button:hover{
                background-color: rgb(58, 58, 196);
            }

            .bet{
                flex-shrink: 0; /* Zabezpiecza przed zmniejszaniem */
                width: auto;
                padding: 10px 20px; /* Zwiększa wewnętrzne odstępy */
                display: inline-block;
            }

            .bet-beige{
                background-color: rgb(223, 203, 167);
            }

            .bet-purple{
                background-color: rgb(68, 14, 153);
                color: white;
            }
        </style>
    </head>
    
    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Oopaaa!</strong> Twoja karta posiada błędy! Popraw je:
            <ul class="mt-3 list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form -->
    <form action="{{ route('weekly-pick.store') }}" method="POST" style="padding-top: 20px">
        @csrf
        <div class="flex-wrap">

            <!-- sekcja 1 -->
            <div class="flex items-center justify-center mt-6">
                <strong>Sekcja 1</strong>
            </div>
            <div class="flex items-center justify-center mb-6">
                <p>Wynik meczu</p>
            </div>

            <div class="flex items-center justify-center mb-6 gap-4">
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="home" :value="$teams[0]" class="text-center"/>
                    <x-text-input type="number" step="1" name="home" id="home" value="{{ old('home') }}" required class="mt-2 text-center" style="width: 5rem;" />
                </div>
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="away" :value="$teams[1]" class="text-center"/>
                    <x-text-input type="number" step="1" name="away" id="away" value="{{ old('away') }}" required class="mt-2 text-center" style="width: 5rem;"/>
                </div>
            </div>
            

            <!-- sekcja 2 -->
            <div class="flex items-center justify-center mt-6">
                <strong>Sekcja 2</strong>
            </div>
            <div class="flex items-center justify-center mb-6">
                <p>Punkty zawodników</p>
            </div>

            <div class="flex-wrap space-y-3">
                <div class="flex items-center justify-center gap-6">
                    <div class="flex items-center justify-between" style="width: 200px;">
                        <input type="radio" id="home1" name="match" class="form-radio" title="Kapitan" >
                        <x-input-label for="home1" :value="$riders[0]" class="text-center ml-3" />
                        <x-text-input type="number" step="1" name="home1" id="home1" value="{{ old('home1') }}" required class="mt-2 text-center ml-3" style="width: 3rem;" />
                    </div>
                    <div class="flex items-center justify-between" style="width: 200px;">
                        <input type="radio" id="away1" name="match" class="form-radio" title="Kapitan">
                        <x-input-label for="away1" :value="$riders[8]" class="text-center  ml-3"/>
                        <x-text-input type="number" step="1" name="away1" id="away1" value="{{ old('away1') }}" required class="mt-2 text-center ml-3" style="width: 3rem;" />
                    </div>
                </div>
                <div class="flex items-center justify-center gap-6">
                    <div class="flex items-center justify-between" style="width: 200px;">
                        <input type="radio" id="home2" name="match" class="form-radio" title="Kapitan">
                        <x-input-label for="home2" :value="$riders[1]" class="text-center ml-3"/>
                        <x-text-input type="number" step="1" name="home2" id="home2" value="{{ old('home2') }}" required class="mt-2 text-center ml-3" style="width: 3rem;" />
                    </div>
                    <div class="flex items-center justify-between" style="width: 200px;">
                        <input type="radio" id="away2" name="match" class="form-radio" title="Kapitan">
                        <x-input-label for="away2" :value="$riders[9]" class="text-center ml-3"/>
                        <x-text-input type="number" step="1" name="away2" id="away2" value="{{ old('away2') }}" required class="mt-2 text-center ml-3" style="width: 3rem;" />
                    </div>
                </div>
                <div class="flex items-center justify-center gap-6">
                    <div class="flex items-center justify-between" style="width: 200px;">
                        <input type="radio" id="home3" name="match" class="form-radio" title="Kapitan">
                        <x-input-label for="home3" :value="$riders[2]" class="text-center ml-3"/>
                        <x-text-input type="number" step="1" name="home3" id="home3" value="{{ old('home3') }}" required class="mt-2 text-center ml-3" style="width: 3rem;" />
                    </div>
                    <div class="flex items-center justify-between" style="width: 200px;">
                        <input type="radio" id="away3" name="match" class="form-radio" title="Kapitan">
                        <x-input-label for="away3" :value="$riders[10]" class="text-center ml-3"/>
                        <x-text-input type="number" step="1" name="away3" id="away3" value="{{ old('away3') }}" required class="mt-2 text-center ml-3" style="width: 3rem;" />
                    </div>
                </div>
                <div class="flex items-center justify-center gap-6">
                    <div class="flex items-center justify-between" style="width: 200px;">
                        <input type="radio" id="home4" name="match" class="form-radio" title="Kapitan">
                        <x-input-label for="home4" :value="$riders[3]" class="text-center ml-3"/>
                        <x-text-input type="number" step="1" name="home4" id="home4" value="{{ old('home4') }}" required class="mt-2 text-center ml-3" style="width: 3rem;" />
                    </div>
                    <div class="flex items-center justify-between" style="width: 200px;">
                        <input type="radio" id="away4" name="match" class="form-radio" title="Kapitan">
                        <x-input-label for="away4" :value="$riders[11]" class="text-center ml-3"/>
                        <x-text-input type="number" step="1" name="away4" id="away4" value="{{ old('away4') }}" required class="mt-2 text-center ml-3" style="width: 3rem;" />
                    </div>
                </div>
                <div class="flex items-center justify-center gap-6">
                    <div class="flex items-center justify-between" style="width: 200px;">
                        <input type="radio" id="home5" name="match" class="form-radio" title="Kapitan">
                        <x-input-label for="home5" :value="$riders[4]" class="text-center ml-3"/>
                        <x-text-input type="number" step="1" name="home5" id="home5" value="{{ old('home5') }}" required class="mt-2 text-center ml-3" style="width: 3rem;" />
                    </div>
                    <div class="flex items-center justify-between" style="width: 200px;">
                        <input type="radio" id="away5" name="match" class="form-radio" title="Kapitan">
                        <x-input-label for="away5" :value="$riders[12]" class="text-center ml-3"/>
                        <x-text-input type="number" step="1" name="away5" id="away5" value="{{ old('away5') }}" required class="mt-2 text-center ml-3" style="width: 3rem;" />
                    </div>
                </div>
                <div class="flex items-center justify-center gap-6">
                    <div class="flex items-center justify-between" style="width: 200px;">
                        <input type="radio" id="home6" name="match" class="form-radio" title="Kapitan">
                        <x-input-label for="home6" :value="$riders[5]" class="text-center ml-3"/>
                        <x-text-input type="number" step="1" name="home6" id="home6" value="{{ old('home6') }}" required class="mt-2 text-center ml-3" style="width: 3rem;" />
                    </div>
                    <div class="flex items-center justify-between" style="width: 200px;">
                        <input type="radio" id="away6" name="match" class="form-radio" title="Kapitan">
                        <x-input-label for="away6" :value="$riders[13]" class="text-center ml-3"/>
                        <x-text-input type="number" step="1" name="away6" id="away6" value="{{ old('away6') }}" required class="mt-2 text-center ml-3" style="width: 3rem;" />
                    </div>
                </div>
                <div class="flex items-center justify-center gap-6">
                    <div class="flex items-center justify-between" style="width: 200px;">
                        <input type="radio" id="home7" name="match" class="form-radio" title="Kapitan">
                        <x-input-label for="home7" :value="$riders[6]" class="text-center ml-3"/>
                        <x-text-input type="number" step="1" name="home7" id="home7" value="{{ old('home7') }}" required class="mt-2 text-center ml-3" style="width: 3rem;" />
                    </div>
                    <div class="flex items-center justify-between" style="width: 200px;">
                        <input type="radio" id="away7" name="match" class="form-radio" title="Kapitan">
                        <x-input-label for="away7" :value="$riders[14]" class="text-center ml-3"/>
                        <x-text-input type="number" step="1" name="away7" id="away7" value="{{ old('away7') }}" required class="mt-2 text-center ml-3" style="width: 3rem;" />
                    </div>
                </div>
                <div class="flex items-center justify-center gap-6">
                    <div class="flex items-center justify-between" style="width: 200px;">
                        <input type="radio" id="home8" name="match" class="form-radio" title="Kapitan">
                        <x-input-label for="home8" :value="$riders[7]" class="text-center ml-3"/>
                        <x-text-input type="number" step="1" name="home8" id="home8" value="{{ old('home8') }}" required class="mt-2 text-center ml-3" style="width: 3rem;" />
                    </div>
                    <div class="flex items-center justify-between" style="width: 200px;">
                        <input type="radio" id="away8" name="match" class="form-radio" title="Kapitan">
                        <x-input-label for="away8" :value="$riders[15]" class="text-center ml-3"/>
                        <x-text-input type="number" step="1" name="away8" id="away8" value="{{ old('away8') }}" required class="mt-2 text-center ml-3" style="width: 3rem;" />
                    </div>
                </div>
            </div>


            <!-- sekcja 3 -->
            <div class="flex items-center justify-center mt-6">
                <strong>Sekcja 3</strong>
            </div>
            <div class="flex items-center justify-center mb-6">
                <p>Head 2 Head</p>
            </div>

            <div class="flex-wrap space-y-3">
                <div class="flex items-center justify-center gap-6 mt-3">
                    <div class="flex items-center justify-between" style="width: 120px;">
                        <x-input-label for="h_duel1" :value="$h2hs[0]" class="text-center"/>
                        <input type="radio" id="h_duel1" name="duel1" class="form-radio ml-3">
                    </div>
                    <div class="flex items-center justify-between" style="width: 120px;">
                        <input type="radio" id="a_duel1" name="duel1" class="form-radio">
                        <x-input-label for="a_duel1" :value="$h2hs[5]" class="text-center  ml-3"/>
                    </div>
                </div>
                <div class="flex items-center justify-center gap-6 mt-3">
                    <div class="flex items-center justify-between" style="width: 120px;">
                        <x-input-label for="h_duel2" :value="$h2hs[1]" class="text-center"/>
                        <input type="radio" id="h_duel2" name="duel2" class="form-radio ml-3">
                    </div>
                    <div class="flex items-center justify-between" style="width: 120px;">
                        <input type="radio" id="a_duel2" name="duel2" class="form-radio">
                        <x-input-label for="a_duel2" :value="$h2hs[6]" class="text-center  ml-3"/>
                    </div>
                </div><div class="flex items-center justify-center gap-6 mt-3">
                    <div class="flex items-center justify-between" style="width: 120px;">
                        <x-input-label for="h_duel3" :value="$h2hs[2]" class="text-center"/>
                        <input type="radio" id="h_duel3" name="duel3" class="form-radio ml-3">
                    </div>
                    <div class="flex items-center justify-between" style="width: 120px;">
                        <input type="radio" id="a_duel3" name="duel3" class="form-radio">
                        <x-input-label for="a_duel3" :value="$h2hs[7]" class="text-center  ml-3"/>
                    </div>
                </div><div class="flex items-center justify-center gap-6 mt-3">
                    <div class="flex items-center justify-between" style="width: 120px;">
                        <x-input-label for="h_duel4" :value="$h2hs[3]" class="text-center"/>
                        <input type="radio" id="h_duel4" name="duel4" class="form-radio ml-3">
                    </div>
                    <div class="flex items-center justify-between" style="width: 120px;">
                        <input type="radio" id="a_duel4" name="duel4" class="form-radio">
                        <x-input-label for="a_duel4" :value="$h2hs[8]" class="text-center  ml-3"/>
                    </div>
                </div><div class="flex items-center justify-center gap-6 mt-3">
                    <div class="flex items-center justify-between" style="width: 120px;">
                        <x-input-label for="h_duel5" :value="$h2hs[4]" class="text-center"/>
                        <input type="radio" id="h_duel5" name="duel5" class="form-radio ml-3">
                    </div>
                    <div class="flex items-center justify-between" style="width: 120px;">
                        <input type="radio" id="a_duel5" name="duel5" class="form-radio">
                        <x-input-label for="a_duel5" :value="$h2hs[9]" class="text-center  ml-3"/>
                    </div>
                </div>
            </div>


            <!-- sekcja 4 -->
            <div class="flex items-center justify-center mt-6">
                <strong>Sekcja 4</strong>
            </div>
            <div class="flex items-center justify-center mb-6">
                <p>Pewniaczki buka</p>
            </div>

            <div class="flex-wrap space-y-3 mx-auto" style="width: 700px;" >

                <!-- Fioletowe -->
                <div class="flex items-center justify-center gap-6 mt-3">
                    <div class="flex items-center">
                        <x-input-label :value="$betText[0]" class="text-center bet bet-purple" style="width: 400px; word-wrap: break-word; white-space: normal;"/>
                    </div>
                    <div class="flex items-center">
                        <button type="button" id="yes_bet1" class="bet-button" onclick="selectBet('tak', 'bet1', this)" style="width: 100px">
                            <strong>tak</strong> x{{ $oddYes[0] }} 
                        </button>
                        <button type="button" id="no_bet1" class="bet-button ml-3" onclick="selectBet('nie', 'bet1', this)" style="width: 100px">
                            <strong>nie</strong> x{{ $oddNo[0] }}
                        </button>
                        <!-- Ukryte pole input do przechowywania wybranej wartości -->
                        <input type="hidden" name="bet1" id="bet1" value="">
                    </div>
                </div>
                <div class="flex items-center justify-center gap-6 mt-3">
                    <div class="flex items-center">
                        <x-input-label :value="$betText[1]" class="text-center bet bet-purple" style="width: 400px; word-wrap: break-word; white-space: normal;"/>
                    </div>
                    <div class="flex items-center">
                        <button type="button" id="yes_bet2" class="bet-button" onclick="selectBet('tak', 'bet2', this)" style="width: 100px">
                            <strong>tak</strong> x{{ $oddYes[1] }} 
                        </button>
                        <button type="button" id="no_bet2" class="bet-button ml-3" onclick="selectBet('nie', 'bet2', this)" style="width: 100px">
                            <strong>nie</strong> x{{ $oddNo[1] }}
                        </button>
                        <!-- Ukryte pole input do przechowywania wybranej wartości -->
                        <input type="hidden" name="bet2" id="bet2" value="">
                    </div>
                </div>
                <div class="flex items-center justify-center gap-6 mt-3">
                    <div class="flex items-center">
                        <x-input-label :value="$betText[2]" class="text-center bet bet-purple" style="width: 400px; word-wrap: break-word; white-space: normal;"/>
                    </div>
                    <div class="flex items-center">
                        <button type="button" id="yes_bet3" class="bet-button" onclick="selectBet('tak', 'bet3', this)" style="width: 100px">
                            <strong>tak</strong> x{{ $oddYes[2] }} 
                        </button>
                        <button type="button" id="no_bet3" class="bet-button ml-3" onclick="selectBet('nie', 'bet3', this)" style="width: 100px">
                            <strong>nie</strong> x{{ $oddNo[2] }}
                        </button>
                        <!-- Ukryte pole input do przechowywania wybranej wartości -->
                        <input type="hidden" name="bet3" id="bet3" value="">
                    </div>
                </div>
                <div class="flex items-center justify-center gap-6 mt-3">
                    <div class="flex items-center">
                        <x-input-label :value="$betText[3]" class="text-center bet bet-purple" style="width: 400px; word-wrap: break-word; white-space: normal;"/>
                    </div>
                    <div class="flex items-center">
                        <button type="button" id="yes_bet4" class="bet-button" onclick="selectBet('tak', 'bet4', this)" style="width: 100px">
                            <strong>tak</strong> x{{ $oddYes[3] }}  
                        </button>
                        <button type="button" id="no_bet4" class="bet-button ml-3" onclick="selectBet('nie', 'bet4', this)" style="width: 100px">
                            <strong>nie</strong> x{{ $oddNo[3] }}
                        </button>
                        <!-- Ukryte pole input do przechowywania wybranej wartości -->
                        <input type="hidden" name="bet4" id="bet4" value="">
                    </div>
                </div>
                <div class="flex items-center justify-center gap-6 mt-3">
                    <div class="flex items-center">
                        <x-input-label :value="$betText[4]" class="text-center bet bet-purple" style="width: 400px; word-wrap: break-word; white-space: normal;" />
                    </div>
                    <div class="flex items-center">
                        <button type="button" id="yes_bet5" class="bet-button" onclick="selectBet('tak', 'bet5', this)" style="width: 100px">
                            <strong>tak</strong> x{{ $oddYes[4] }}  
                        </button>
                        <button type="button" id="no_bet5" class="bet-button ml-3" onclick="selectBet('nie', 'bet5', this)" style="width: 100px">
                            <strong>nie</strong> x{{ $oddNo[4] }}
                        </button>
                        <!-- Ukryte pole input do przechowywania wybranej wartości -->
                        <input type="hidden" name="bet5" id="bet5" value="">
                    </div>
                </div>

                <!-- bezowe -->
                <div class="flex items-center justify-center gap-6 mt-3">
                    <div class="flex items-center">
                        <x-input-label :value="$betText[5]" class="text-center bet bet-beige" style="width: 400px; word-wrap: break-word; white-space: normal;"/>
                    </div>
                    <div class="flex items-center">
                        <button type="button" id="yes_bet6" class="bet-button" onclick="selectBet('tak', 'bet6', this)" style="width: 100px">
                            <strong>tak</strong> x{{ $oddYes[5] }} 
                        </button>
                        <button type="button" id="no_bet6" class="bet-button ml-3" onclick="selectBet('nie', 'bet6', this)" style="width: 100px">
                            <strong>nie</strong> x{{ $oddNo[5] }}
                        </button>
                        <!-- Ukryte pole input do przechowywania wybranej wartości -->
                        <input type="hidden" name="bet6" id="bet6" value="">
                    </div>
                </div>
                <div class="flex items-center justify-center gap-6 mt-3">
                    <div class="flex items-center">
                        <x-input-label :value="$betText[6]" class="text-center bet bet-beige" style="width: 400px; word-wrap: break-word; white-space: normal;"/>
                    </div>
                    <div class="flex items-center">
                        <button type="button" id="yes_bet7" class="bet-button" onclick="selectBet('tak', 'bet7', this)" style="width: 100px">
                            <strong>tak</strong> x{{ $oddYes[6] }} 
                        </button>
                        <button type="button" id="no_bet7" class="bet-button ml-3" onclick="selectBet('nie', 'bet7', this)" style="width: 100px">
                            <strong>nie</strong> x{{ $oddNo[6] }}
                        </button>
                        <!-- Ukryte pole input do przechowywania wybranej wartości -->
                        <input type="hidden" name="bet7" id="bet7" value="">
                    </div>
                </div>
                <div class="flex items-center justify-center gap-6 mt-3">
                    <div class="flex items-center">
                        <x-input-label :value="$betText[7]" class="text-center bet bet-beige" style="width: 400px; word-wrap: break-word; white-space: normal;"/>
                    </div>
                    <div class="flex items-center">
                        <button type="button" id="yes_bet8" class="bet-button" onclick="selectBet('tak', 'bet8', this)" style="width: 100px">
                            <strong>tak</strong> x{{ $oddYes[7] }} 
                        </button>
                        <button type="button" id="no_bet8" class="bet-button ml-3" onclick="selectBet('nie', 'bet8', this)" style="width: 100px">
                            <strong>nie</strong> x{{ $oddNo[7] }}
                        </button>
                        <!-- Ukryte pole input do przechowywania wybranej wartości -->
                        <input type="hidden" name="bet8" id="bet8" value="">
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-center mt-3">
                <x-input-label for="bet_amount" :value="__('Obstaw')" class="text-center"/>
                <x-text-input type="number" step="1" name="bet_amount" id="bet_amount" value="{{ old('bet_amount') }}" class="mt-2 text-center ml-3" style="width: 5rem;" />
            </div>

            <!-- Przycisk wyslania -->
            <div class="flex items-center justify-center mt-6">
                <x-primary-button class="ms-3 mb-6" type="submit">
                    {{ __('Zapisz') }}
                </x-primary-button>
            </div>
        </div>                            
    </form>
    <script>
        function selectBet(value, inputId, button) {
            // Znajdź ukryte pole input
            let input = document.getElementById(inputId);
        
            // Jeśli przycisk jest już wybrany, odznacz go
            if (button.classList.contains('selected-bet-button')) {
                button.classList.remove('selected-bet-button');
                input.value = ''; // Wyczyść wartość w ukrytym polu input
            } else {
                // Zresetuj wszystkie przyciski w tej grupie
                let buttons = button.parentElement.getElementsByClassName('bet-button');
                for (let i = 0; i < buttons.length; i++) {
                    buttons[i].classList.remove('selected-bet-button'); // Usuń wybraną klasę
                }
        
                // Ustaw wybrany styl na klikniętym przycisku
                button.classList.add('selected-bet-button'); // Dodaj wybraną klasę
        
                // Ustaw wartość w ukrytym polu input
                input.value = value;
            }
        }
    </script>
</x-app-layout>