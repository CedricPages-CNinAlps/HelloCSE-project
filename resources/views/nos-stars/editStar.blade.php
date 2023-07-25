<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edition d\'une star') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section style="display: flex; flex-direction: column; align-items: stretch; flex-wrap: wrap;">
                        <a class="p-6 text-gray-900 dark:text-gray-100" role="button" type="button"
                           href="{{ route('show-stars') }}"
                           style="margin-bottom: 40px">
                            <x-primary-button>Retour à la liste</x-primary-button>
                        </a>

                        <form class="editstar" method="POST"
                              action="{{ route('update-star', ['id' => $editStar['id']]) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row g-3">
                                <div class="col-sm-4 p-6 text-gray-900 dark:text-gray-100">
                                    <x-input-label for="firstname" :value="__('Prénom')"/>
                                    <x-text-input type="text" class="form-control" name="firstname" placeholder="Prénom"
                                                  required value="{{$editStar['firstname']}}" style="width: 100%"/>
                                </div>

                                <div class="col-sm-4 p-6 text-gray-900 dark:text-gray-100">
                                    <x-input-label for="lastname" :value="__('Nom')"/>
                                    <x-text-input type="text" class="form-control" name="lastname" placeholder="Nom"
                                                  required value="{{$editStar['lastname']}}" style="width: 100%"/>
                                </div>

                                <div class="col-sm-4 p-6 text-gray-900 dark:text-gray-100">
                                    <x-input-label for="description" :value="__('Description')"/>
                                    <x-text-input type="textarea" class="form-control" name="description"
                                                  placeholder="Description"
                                                  required style="width: 100%; height: 500px"
                                                  value="{{$editStar['description']}}"/>
                                </div>

                                <div class="col-sm-4 p-6 text-gray-900 dark:text-gray-100">
                                    <x-input-label for="image" :value="__('Image')"/>
                                    <x-text-input type="file" class="form-control" name="image"
                                                  placeholder="Fichier image" id="image" accept="image/*"/>
                                </div>

                                <!-- Afficher l'image actuelle -->
                                @if($editStar['image'])
                                    <h3>Image actuelle</h3>
                                    <img src="{{$editStar['image']}}" alt="Image actuelle"
                                         style="max-width: 100px; margin-right: 10px;">
                                @endif
                                <!-- Afficher la nouvelle image en prévisualisation -->
                                <h3>Nouvelle image</h3>
                                <img id="previewImage" src="#" alt="Prévisualisation de la nouvelle image"
                                     style="max-width: 100px;">
                                <script>
                                    document.getElementById("image").addEventListener("change", function (event) {
                                        // Récupérer le fichier sélectionné par l'utilisateur
                                        const file = event.target.files[0];

                                        // Vérifier si un fichier a été sélectionné
                                        if (file) {
                                            // Créer une URL locale pour le fichier
                                            const url = URL.createObjectURL(file);

                                            // Afficher l'image prévisualisée
                                            const previewImage = document.getElementById("previewImage");
                                            previewImage.src = url;
                                            previewImage.style.display = "block";
                                        } else {
                                            // Cacher l'image prévisualisée si aucun fichier n'est sélectionné
                                            const previewImage = document.getElementById("previewImage");
                                            previewImage.src = "#";
                                            previewImage.style.display = "none";
                                        }
                                    });
                                </script>

                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    <x-primary-button>{{ __('Mettre à jour la star') }}</x-primary-button>
                                </div>

                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
