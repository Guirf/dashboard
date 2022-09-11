<x-app-layout>
    <!-- container -->
    <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 ">
        <!-- wrapper -->
        <div class="max-w-md w-full space-y-6 flex flex-col justify-center items-center">
            <!-- header -->
            <div>
                <h1 class="text-center text-3xl font-extrabold text-gray-900">Logar na fila</h1>
            </div>
            <!-- end-header -->
            <div class="rounded-lg bg-white space-y-20 shadow-lg w-full ">
                <!-- user-info -->
                <div class="flex flex-col items-center m-20">
                    <!-- box-icon -->
                    <div class=" user">
                        <box-icon name='user'></box-icon>
                    </div>
                    <!-- end-box-icon -->
                    <p class="text-center text-3xl text-gray-900">{{ Auth::user()->name }}</p>
                    <p class="text-center text-xl text-gray-500">Ramal - {{ Auth::user()->ramal }}</p>
                </div>
                <!-- end-user-info -->
                <!-- buttons -->
                <div class="flex items-center justify-center space-x-4 border-t rounded-b-md bg-gray-200 border-gray-400 px-5 py-6 ">
                    <button><a wire:click="fila/login" class="py-3 px-10 bg-blue-600 rounded-md text-white hover:bg-blue-800">Logar</a></button>
                    
                    <a class="py-3 px-7 bg-red-500 rounded-md text-white hover:bg-red-800">Deslogar</a>
                </div>
                <!-- end-buttons -->
            </div>
        </div>
        <!-- end-wrapper -->
    </div>
    <!-- end-container -->



</x-app-layout>
