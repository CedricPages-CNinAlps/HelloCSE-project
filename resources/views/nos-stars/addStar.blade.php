<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Création d\'une star') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <section style="display: flex; flex-direction: column; align-items: stretch; flex-wrap: wrap;">
                    <a class="p-6 text-gray-900 dark:text-gray-100" role="button" type="button"
                       href="{{ route('show-stars') }}"
                       style="margin-bottom: 40px">
                        <x-primary-button>Retour à la liste</x-primary-button>
                    </a>

                    <form class="newstar" method="POST" action="{{ route('added-star') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="row g-3">
                            <div class="col-sm-4 p-6 text-gray-900 dark:text-gray-100">
                                <x-input-label for="firstname" :value="__('Prénom')"/>
                                <x-text-input type="text" class="form-control" name="firstname" placeholder="Prénom"
                                              required style="width: 100%"/>
                            </div>

                            <div class="col-sm-4 p-6 text-gray-900 dark:text-gray-100">
                                <x-input-label for="lastname" :value="__('Nom')"/>
                                <x-text-input type="text" class="form-control" name="lastname" placeholder="Nom"
                                              required style="width: 100%"/>
                            </div>

                            <div class="col-sm-4 p-6 text-gray-900 dark:text-gray-100">
                                <x-input-label for="description" :value="__('Description')"/>
                                <x-text-input type="textarea" class="form-control" name="description"
                                              placeholder="Description"
                                              required style="width: 100%; height: 500px"/>
                            </div>
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <x-primary-button>{{ __('Ajouter la star') }}</x-primary-button>
                            </div>
                        </div>
                    </form>
                </section>

            </div>
        </div>
    </div>

</x-app-layout>
