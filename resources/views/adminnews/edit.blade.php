<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{!empty($actu)?'Modification d\'une news':'Création d\'une news'}} 
        </h2>
    </x-slot>

    <div class="py-12 bg-[url('https://www.alef.ir/files/post/lg/2019/29/133483.jpg')]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white opacity-90 border border-[#000000] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @include('adminnews.partials.form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
