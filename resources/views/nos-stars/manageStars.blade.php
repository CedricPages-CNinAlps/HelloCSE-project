<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Liste de nos stars') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Listing de nos stars") }}
                </div>
                <h4 class="py-3 p-6 text-gray-900 dark:text-gray-100">
                    Nombre de stars enregistrées : {{ $countStars }}
                </h4>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a class="btn btn-success add" role="button" type="button" href="{{ route('add-star') }}"><x-primary-button>Ajouter une nouvelle
                            star à la liste</x-primary-button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="table-manage">
                    <table
                        class="table table-light table-striped table-bordered table-hover table-sm  align-middle p-6 text-gray-900 dark:text-gray-100">
                        <tr class="align-middle table-secondary text-center">
                            <th>ID</th>
                            <th>EDITER</th>
                            <th>SUPPRIMER</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Descriton</th>
                            <th>Visuel</th>
                        </tr>

                        @foreach ($stars as $star)
                            <tr>
                                <td class="text-center" style="width: 60px">{{$star['id']}}</td>
                                <td style="width: 60px">
                                    <a class="btn edit-header" role="button" type="button"
                                       href="{{ route('edit-star', ['id' => $star['id']]) }}">
                                        <img src="/images/pictos/edit.svg">
                                    </a>
                                </td>
                                <td style="width: 60px">
                                    <form class="delete-employee" action="{{ route('delete-star', ['id' => $star['id']]) }}"
                                          method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-lg" type="submit">
                                            <img src="/images/pictos/delete.svg">
                                        </button>
                                    </form>
                                </td>
                                <td>{{$star['firstname']}}</td>
                                <td>{{$star['lastname']}}</td>
                                <td>
                                    @if (strlen($star['description']) > 150)
                                        <p>{{ substr($star['description'], 0, 150) }}...</p>
                                        <button onclick="toggleFullText()">Voir plus</button>
                                        <p id="fullText" style="display: none;">{{ $star['description'] }}</p>
                                    @else
                                        <p>{{ $star['description'] }}</p>
                                    @endif
                                    <script>
                                        function toggleFullText() {
                                            var fullText = document.getElementById('fullText');
                                            var button = document.querySelector('button');

                                            if (fullText.style.display === 'none') {
                                                fullText.style.display = 'block';
                                                button.textContent = 'Voir moins';
                                            } else {
                                                fullText.style.display = 'none';
                                                button.textContent = 'Voir plus';
                                            }
                                        }
                                    </script>
                                </td>
                                <td><img src="{{$star['image']}}" width="50px"></td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
