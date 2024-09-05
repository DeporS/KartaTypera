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

            .bet{
                flex-shrink: 0; /* Zabezpiecza przed zmniejszaniem */
                width: auto;
                padding: 10px 20px; /* Zwiększa wewnętrzne odstępy */
                display: inline-block;
                white-space: nowrap; /* Zabezpiecza przed zawijaniem tekstu */
                text-align: right;
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

    <!-- formularz -->
    <form action="{{ route('weekly-pick-panel.store') }}" method="POST" style="padding-top: 20px">
        @csrf
        <div class="flex-wrap">

            <!-- tydzien i zamkniecie -->
            <div class="flex items-center justify-center mt-3">
                <x-input-label for="week" :value="__('Tydzień')" class="text-center"/>
                <x-text-input type="number" step="1" name="week" id="week" value="{{ old('week') }}" required class="mt-2 text-center ml-3" style="width: 5rem;" />
            </div>
            <div class="flex items-center justify-center mt-3">
                <x-input-label for="time" :value="__('Zamyka się')" class="text-center"/>
                <x-text-input type="time" step="1" name="time" id="time" value="{{ old('time') }}" required class="mt-2 text-center ml-3" style="width: 8rem;" />
                <x-text-input type="date" step="1" name="date" id="date" value="{{ old('date') }}" required class="mt-2 text-center ml-3" style="width: 8rem;" />
            </div>

            <!-- sekcja 1 -->
            <div class="flex items-center justify-center mt-6">
                <strong>Sekcja 1</strong>
            </div>
            <div class="flex items-center justify-center">
                <p>Zespoły</p>
            </div>

            <div class="flex items-center justify-center mb-6 gap-4 mt-3">
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="home" :value="__('Zespół 1')" class="text-center"/>
                    <x-text-input type="text" name="home" id="home" value="{{ old('home') }}" required class="mt-2 text-center" style="width: 12rem;" />
                </div>
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="away" :value="__('Zespół 2')" class="text-center"/>
                    <x-text-input type="text" name="away" id="away" value="{{ old('away') }}" required class="mt-2 text-center" style="width: 12rem;" />
                </div>
            </div>

            <!-- sekcja 2 -->
            <div class="flex items-center justify-center mt-6">
                <strong>Sekcja 2</strong>
            </div>
            <div class="flex items-center justify-center">
                <p>Zawodnicy</p>
            </div>
            <div class="flex items-center justify-center gap-4 mt-3">
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="rider1a" :value="__('Zespół 1')" class="text-center"/>
                    <x-text-input type="text" name="rider1a" id="rider1a" value="{{ old('rider1a') }}" required class="mt-2 text-center" style="width: 12rem;" placeholder="1."/>
                </div>
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="away" :value="__('Zespół 2')" class="text-center"/>
                    <x-text-input type="text" name="rider1b" id="rider1b" value="{{ old('rider1b') }}" required class="mt-2 text-center" style="width: 12rem;" placeholder="1."/>
                </div>
            </div>
            <div class="flex items-center justify-center mt-2 gap-4">
                <div class="w-1/3 flex flex-col items-center">
                    <x-text-input type="text" name="rider2a" id="rider2a" value="{{ old('rider2a') }}" required class="text-center" style="width: 12rem;" placeholder="2."/>
                </div>
                <div class="w-1/3 flex flex-col items-center">
                    <x-text-input type="text" name="rider2b" id="rider2b" value="{{ old('rider2b') }}" required class="text-center" style="width: 12rem;" placeholder="2."/>
                </div>
            </div>
            <div class="flex items-center justify-center mt-2 gap-4">
                <div class="w-1/3 flex flex-col items-center">
                    <x-text-input type="text" name="rider3a" id="rider3a" value="{{ old('rider3a') }}" required class="text-center" style="width: 12rem;" placeholder="3."/>
                </div>
                <div class="w-1/3 flex flex-col items-center">
                    <x-text-input type="text" name="rider3b" id="rider3b" value="{{ old('rider3b') }}" required class="text-center" style="width: 12rem;" placeholder="3."/>
                </div>
            </div>
            <div class="flex items-center justify-center mt-2 gap-4">
                <div class="w-1/3 flex flex-col items-center">
                    <x-text-input type="text" name="rider4a" id="rider4a" value="{{ old('rider4a') }}" required class="text-center" style="width: 12rem;" placeholder="4."/>
                </div>
                <div class="w-1/3 flex flex-col items-center">
                    <x-text-input type="text" name="rider4b" id="rider4b" value="{{ old('rider4b') }}" required class="text-center" style="width: 12rem;" placeholder="4."/>
                </div>
            </div>
            <div class="flex items-center justify-center mt-2 gap-4">
                <div class="w-1/3 flex flex-col items-center">
                    <x-text-input type="text" name="rider5a" id="rider5a" value="{{ old('rider5a') }}" required class="text-center" style="width: 12rem;" placeholder="5."/>
                </div>
                <div class="w-1/3 flex flex-col items-center">
                    <x-text-input type="text" name="rider5b" id="rider5b" value="{{ old('rider5b') }}" required class="text-center" style="width: 12rem;" placeholder="5."/>
                </div>
            </div>
            <div class="flex items-center justify-center mt-2 gap-4">
                <div class="w-1/3 flex flex-col items-center">
                    <x-text-input type="text" name="rider6a" id="rider6a" value="{{ old('rider6a') }}" required class="text-center" style="width: 12rem;" placeholder="6."/>
                </div>
                <div class="w-1/3 flex flex-col items-center">
                    <x-text-input type="text" name="rider6b" id="rider6b" value="{{ old('rider6b') }}" required class="text-center" style="width: 12rem;" placeholder="6."/>
                </div>
            </div>
            <div class="flex items-center justify-center mt-2 gap-4">
                <div class="w-1/3 flex flex-col items-center">
                    <x-text-input type="text" name="rider7a" id="rider7a" value="{{ old('rider7a') }}" required class="text-center" style="width: 12rem;" placeholder="7."/>
                </div>
                <div class="w-1/3 flex flex-col items-center">
                    <x-text-input type="text" name="rider7b" id="rider7b" value="{{ old('rider7b') }}" required class="text-center" style="width: 12rem;" placeholder="7."/>
                </div>
            </div>
            <div class="flex items-center justify-center mt-2 gap-4">
                <div class="w-1/3 flex flex-col items-center">
                    <x-text-input type="text" name="rider8a" id="rider8a" value="{{ old('rider8a') }}" required class="text-center" style="width: 12rem;" placeholder="8."/>
                </div>
                <div class="w-1/3 flex flex-col items-center">
                    <x-text-input type="text" name="rider8b" id="rider8b" value="{{ old('rider8b') }}" required class="text-center" style="width: 12rem;" placeholder="8."/>
                </div>
            </div>

            <!-- sekcja 3 -->
            <div class="flex items-center justify-center mt-6">
                <strong>Sekcja 3</strong>
            </div>
            <div class="flex items-center justify-center ">
                <p>Head4head 😏</p>
            </div>

            <div class="flex items-center justify-center mt-3">
                <p>Starcie 1</p>
            </div>
            <div class="flex items-center justify-center gap-4">
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="head2head1a" :value="__('Zespół 1')" class="text-center"/>
                    <select id="head2head1a" required value="{{ old('head2head1a') }}" name="head2head1a">
                        <?php for($i = 1; $i <= 8; $i++): ?>
                            <option value ="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?> 
                    </select>
                </div>
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="head2head1b" :value="__('Zespół 2')" class="text-center"/>
                    <select id="head2head1b" required value="{{ old('head2head1b') }}" name="head2head1b">
                        <?php for($i = 1; $i <= 8; $i++): ?>
                            <option value ="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?> 
                    </select>
                </div>
            </div>
            <div class="flex items-center justify-center">
                <p>Starcie 2</p>
            </div>
            <div class="flex items-center justify-center gap-4">
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="head2head2a" :value="__('Zespół 1')" class="text-center"/>
                    <select id="head2head2a" required value="{{ old('head2head2a') }}" name="head2head2a">
                        <?php for($i = 1; $i <= 8; $i++): ?>
                            <option value ="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?> 
                    </select>
                </div>
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="head2head2b" :value="__('Zespół 2')" class="text-center"/>
                    <select id="head2head2b" required value="{{ old('head2head2b') }}" name="head2head2b">
                        <?php for($i = 1; $i <= 8; $i++): ?>
                            <option value ="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?> 
                    </select>
                </div>
            </div>
            <div class="flex items-center justify-center">
                <p>Starcie 3</p>
            </div>
            <div class="flex items-center justify-center gap-4">
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="head2head3a" :value="__('Zespół 1')" class="text-center"/>
                    <select id="head2head3a" required value="{{ old('head2head3a') }}" name="head2head3a">
                        <?php for($i = 1; $i <= 8; $i++): ?>
                            <option value ="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?> 
                    </select>
                </div>
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="head2head3b" :value="__('Zespół 2')" class="text-center"/>
                    <select id="head2head3b" required value="{{ old('head2head3b') }}" name="head2head3b">
                        <?php for($i = 1; $i <= 8; $i++): ?>
                            <option value ="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?> 
                    </select>
                </div>
            </div>
            <div class="flex items-center justify-center">
                <p>Starcie 4</p>
            </div>
            <div class="flex items-center justify-center gap-4">
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="head2head4a" :value="__('Zespół 1')" class="text-center"/>
                    <select id="head2head4a" required value="{{ old('head2head4a') }}" name="head2head4a">
                        <?php for($i = 1; $i <= 8; $i++): ?>
                            <option value ="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?> 
                    </select>
                </div>
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="head2head4b" :value="__('Zespół 2')" class="text-center"/>
                    <select id="head2head4b" required value="{{ old('head2head4b') }}" name="head2head4b">
                        <?php for($i = 1; $i <= 8; $i++): ?>
                            <option value ="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?> 
                    </select>
                </div>
            </div>
            <div class="flex items-center justify-center">
                <p>Starcie 5</p>
            </div>
            <div class="flex items-center justify-center gap-4">
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="head2head5a" :value="__('Zespół 1')" class="text-center"/>
                    <select id="head2head5a" required value="{{ old('head2head5a') }}" name="head2head5a">
                        <?php for($i = 1; $i <= 8; $i++): ?>
                            <option value ="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?> 
                    </select>
                </div>
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="head2head5b" :value="__('Zespół 2')" class="text-center"/>
                    <select id="head2head5b" required value="{{ old('head2head5b') }}" name="head2head5b">
                        <?php for($i = 1; $i <= 8; $i++): ?>
                            <option value ="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?> 
                    </select>
                </div>
            </div>

            <!-- sekcja 4 -->
            <div class="flex items-center justify-center mt-6">
                <strong>Sekcja 4</strong>
            </div>
            <div class="flex items-center justify-center">
                <p>Bukozarobas</p>
            </div>

            <!-- fioletowe -->
            <div class="flex items-center justify-center gap-4 mt-3">
                <strong class="bet bet-purple">1.</strong>
                <textarea type="text" name="bet1" id="bet1" value="{{ old('bet1') }}" required class="mt-2 block" style="width: 25rem; height: 6rem;" placeholder="treść zakładu"></textarea>
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="odd1a" :value="__('Kurs tak')" class="text-center"/>
                    <x-text-input type="number" step="0.01" name="odd1a" id="odd1a" value="{{ old('odd1a') }}" required class="mt-2 text-center" style="width: 5rem;" placeholder="1.85"/>
                </div>
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="odd1b" :value="__('Kurs nie')" class="text-center"/>
                    <x-text-input type="number" step="0.01" name="odd1b" id="odd1b" value="{{ old('odd1b') }}" required class="mt-2 text-center" style="width: 5rem;" placeholder="1.85"/>
                </div>
            </div>
            <div class="flex items-center justify-center gap-4 mt-3">
                <strong class="bet bet-purple">2.</strong>
                <textarea type="text" name="bet2" id="bet2" value="{{ old('bet2') }}" required class="mt-2 block" style="width: 25rem; height: 6rem;" placeholder="treść zakładu"></textarea>
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="odd2a" :value="__('Kurs tak')" class="text-center"/>
                    <x-text-input type="number" step="0.01" name="odd2a" id="odd2a" value="{{ old('odd2a') }}" required class="mt-2 text-center" style="width: 5rem;" placeholder="1.85"/>
                </div>
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="odd2b" :value="__('Kurs nie')" class="text-center"/>
                    <x-text-input type="number" step="0.01" name="odd2b" id="odd2b" value="{{ old('odd2b') }}" required class="mt-2 text-center" style="width: 5rem;" placeholder="1.85"/>
                </div>
            </div>
            <div class="flex items-center justify-center gap-4 mt-3">
                <strong class="bet bet-purple">3.</strong>
                <textarea type="text" name="bet3" id="bet3" value="{{ old('bet3') }}" required class="mt-2 block" style="width: 25rem; height: 6rem;" placeholder="treść zakładu"></textarea>
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="odd3a" :value="__('Kurs tak')" class="text-center"/>
                    <x-text-input type="number" step="0.01" name="odd3a" id="odd3a" value="{{ old('odd3a') }}" required class="mt-2 text-center" style="width: 5rem;" placeholder="1.85"/>
                </div>
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="odd3b" :value="__('Kurs nie')" class="text-center"/>
                    <x-text-input type="number" step="0.01" name="odd3b" id="odd3b" value="{{ old('odd3b') }}" required class="mt-2 text-center" style="width: 5rem;" placeholder="1.85"/>
                </div>
            </div>
            <div class="flex items-center justify-center gap-4 mt-3">
                <strong class="bet bet-purple">4.</strong>
                <textarea type="text" name="bet4" id="bet4" value="{{ old('bet4') }}" required class="mt-2 block" style="width: 25rem; height: 6rem;" placeholder="treść zakładu"></textarea>
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="odd4a" :value="__('Kurs tak')" class="text-center"/>
                    <x-text-input type="number" step="0.01" name="odd4a" id="odd4a" value="{{ old('odd4a') }}" required class="mt-2 text-center" style="width: 5rem;" placeholder="1.85"/>
                </div>
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="odd4b" :value="__('Kurs nie')" class="text-center"/>
                    <x-text-input type="number" step="0.01" name="odd4b" id="odd4b" value="{{ old('odd4b') }}" required class="mt-2 text-center" style="width: 5rem;" placeholder="1.85"/>
                </div>
            </div>
            <div class="flex items-center justify-center gap-4 mt-3">
                <strong class="bet bet-purple">5.</strong>
                <textarea type="text" name="bet5" id="bet5" value="{{ old('bet5') }}" required class="mt-2 block" style="width: 25rem; height: 6rem;" placeholder="treść zakładu"></textarea>
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="odd5a" :value="__('Kurs tak')" class="text-center"/>
                    <x-text-input type="number" step="0.01" name="odd5a" id="odd5a" value="{{ old('odd5a') }}" required class="mt-2 text-center" style="width: 5rem;" placeholder="1.85"/>
                </div>
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="odd5b" :value="__('Kurs nie')" class="text-center"/>
                    <x-text-input type="number" step="0.01" name="odd5b" id="odd5b" value="{{ old('odd5b') }}" required class="mt-2 text-center" style="width: 5rem;" placeholder="1.85"/>
                </div>
            </div>
            <!-- bezowe -->
            <div class="flex items-center justify-center gap-4 mt-3">
                <strong class="bet bet-beige">6.</strong>
                <textarea type="text" name="bet6" id="bet6" value="{{ old('bet6') }}" required class="mt-2 block" style="width: 25rem; height: 6rem;" placeholder="treść zakładu"></textarea>
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="odd6a" :value="__('Kurs tak')" class="text-center"/>
                    <x-text-input type="number" step="0.01" name="odd6a" id="odd6a" value="{{ old('odd6a') }}" required class="mt-2 text-center" style="width: 5rem;" placeholder="1.85"/>
                </div>
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="odd6b" :value="__('Kurs nie')" class="text-center"/>
                    <x-text-input type="number" step="0.01" name="odd6b" id="odd6b" value="{{ old('odd6b') }}" required class="mt-2 text-center" style="width: 5rem;" placeholder="1.85"/>
                </div>
            </div>
            <div class="flex items-center justify-center gap-4 mt-3">
                <strong class="bet bet-beige">7.</strong>
                <textarea type="text" name="bet7" id="bet7" value="{{ old('bet7') }}" required class="mt-2 block" style="width: 25rem; height: 6rem;" placeholder="treść zakładu"></textarea>
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="odd7a" :value="__('Kurs tak')" class="text-center"/>
                    <x-text-input type="number" step="0.01" name="odd7a" id="odd7a" value="{{ old('odd7a') }}" required class="mt-2 text-center" style="width: 5rem;" placeholder="1.85"/>
                </div>
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="odd7b" :value="__('Kurs nie')" class="text-center"/>
                    <x-text-input type="number" step="0.01" name="odd7b" id="odd7b" value="{{ old('odd7b') }}" required class="mt-2 text-center" style="width: 5rem;" placeholder="1.85"/>
                </div>
            </div>
            <div class="flex items-center justify-center gap-4 mt-3">
                <strong class="bet bet-beige">8.</strong>
                <textarea type="text" name="bet8" id="bet8" value="{{ old('bet8') }}" required class="mt-2 block" style="width: 25rem; height: 6rem;" placeholder="treść zakładu"></textarea>
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="odd8a" :value="__('Kurs tak')" class="text-center"/>
                    <x-text-input type="number" step="0.01" name="odd8a" id="odd8a" value="{{ old('odd8a') }}" required class="mt-2 text-center" style="width: 5rem;" placeholder="1.85"/>
                </div>
                <div class="w-1/3 flex flex-col items-center">
                    <x-input-label for="odd8b" :value="__('Kurs nie')" class="text-center"/>
                    <x-text-input type="number" step="0.01" name="odd8b" id="odd8b" value="{{ old('odd8b') }}" required class="mt-2 text-center" style="width: 5rem;" placeholder="1.85"/>
                </div>
            </div>

            <!-- Przycisk wyslania -->
            <div class="flex items-center justify-center mt-6">
                <x-primary-button class="ms-3 mb-6" type="submit">
                    {{ __('Zapisz') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-app-layout>
