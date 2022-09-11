<x-app-layout>
    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- Big Container -->
        <div class="border-b border-gray-200 bg-white p-6">
          @can('users') 
            Dados do usuário
          @elsecan('admin')
  
          <form method="POST" action="{{ route('add/users/new') }}">
            <!-- Form -->
            @csrf
            <div class="p-8">
              <!-- Grid -->
              <div class="grid grid-cols-2 gap-4 p-2">
                <!-- Nome -->
                <div class="flex flex-col">
                  <x-label for="name" :value="__('Name')" />
                  <x-input id="name" class="mt-1" type="text" name="name" required autocomplete="current-name" />
                </div>
                <!-- Fim Nome -->
  
                <!-- Ramal -->
                <div class="flex flex-col">
                  <x-label for="ramal" :value="__('Ramal')" />
  
                  <x-input id="ramal" class="mt-1" type="text" name="ramal" required autocomplete="current-ramal" />
                </div>
                <!-- Fim Ramal -->
  
                <!-- CPF -->
                <div class="flex flex-col">
                  <x-label for="department" :value="__('Setor')" />
                  
  
                  <x-input id="department" class="mt-1" type="text" name="department" required autocomplete="current-department" />
                </div>
                <!-- Fim CPF -->
  
                <!-- Senha -->
                <div class="flex flex-col">
                  <x-label for="password" :value="__('Password')" />
  
                  <x-input id="password" class="mt-1" type="text" name="password" required autocomplete="current-password" />
                </div>
                <!-- Fim Senha -->

                <div class="block mt-2">
                    <label for="permission" class="inline-flex items-center">
                        <input id="permission" type="checkbox" class="rounded border-gray-900 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="permission">
                        <span class="ml-2 text-sm text-gray-900">{{ __('Administrador?') }}</span>
                    </label>
                </div>

                <!-- Default switch -->
                

              </div>
              <!--Fim Grid-->
            </div>
            <!-- Fim Container -->
  
            <div class="mt-4">
              <!-- Botão -->
              <x-button> {{ __('Adicionar') }} </x-button>
            </div>
            <!-- Fim Botão -->
          </form>
          <!-- Fim Form -->
          @endcan
        </div>
        <!-- Fim Big Container -->
      </div>
    </div>
    
  </x-app-layout>
  