<div class="mt-4 mb-6">
  <p class="
                                      mb-2
                                      text-lg
                                      font-semibold
                                      text-gray-700
                                      dark:text-gray-300
                                    ">
    Agregar Usuario
  </p>
  <!-- Modal inputs -->
  <label class="block mt-4 text-sm">
    <span class="text-gray-700 dark:text-gray-400">
      Nombre
    </span>
    <input id="name" name="name" value="{{isset($user->name)?$user->name:''}}" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="" />
  </label>
  @error('name')
    <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{$message}}</p>
  @enderror


  <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Tipo de documento
                </span>
                <select name="tipo_documento"
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                >
                  <option  value="DNI">DNI</option>
                  <option  value="PASAPORTE">PASAPORTE</option>
                  <option  value="RUC">RUC</option>

                </select>
  </label>

  <label class="block mt-4 text-sm">
    <span class="text-gray-700 dark:text-gray-400">
      Número de Documento
    </span>
    <input id="num_documento" name="num_documento" value="{{isset($user->num_documento)?$user->num_documento:''}}" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="" />
  </label>

  <label class="block mt-4 text-sm">
    <span class="text-gray-700 dark:text-gray-400">
      Teléfono
    </span>
    <input id="telefono" name="telefono" value="{{isset($user->telefono)?$user->telefono:''}}" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="" />
  </label>
  <label class="block mt-4 text-sm">
    <span class="text-gray-700 dark:text-gray-400">
      Email
    </span>
    <input id="email" name="email" value="{{isset($user->email)?$user->email:''}}" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="" />
  </label>
  @error('email')
    <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{$message}}</p>
  @enderror
  <label class="block mt-4 text-sm">
    <span class="text-gray-700 dark:text-gray-400">
      Dirección
    </span>
    <input id="direccion" name="direccion" value="{{isset($user->direccion)?$user->direccion:''}}" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="" />
  </label>

  <label class="block mt-4 text-sm">
    <span class="text-gray-700 dark:text-gray-400">
      Password
    </span>
    <input id="password" name="password" value="{{isset($user->password)?$user->password:''}}" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="" />
  </label>
  @error('password')
      <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{$message}}</p>
    @enderror
  <label class="block mt-4 text-sm">
    <span class="text-gray-700 dark:text-gray-400">
      Confirmar password
    </span>
    <input id="password_confirmation" name="password_confirmation" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="" />
  </label>
  <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Rol
                </span>
                <select name="id_rol"
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                >
                @foreach($rols as $rol)
                  <option  value="{{$rol->id}}">{{$rol->nombre}}</option>
                @endforeach
                </select>
  </label>
  <label class="block mt-4 text-sm">
    <span class="text-gray-700 dark:text-gray-400">
      Foto
    </span>
    <input type="file" id="imagen" name="imagen" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"/>
  </label>
</div>
<footer class="
                                    flex flex-col
                                    items-center
                                    justify-end
                                    px-6
                                    py-3

                                    space-y-4
                                    sm:space-y-0 sm:space-x-6
                                    sm:flex-row

                                  ">
  <a href="{{url()->previous()}}" class="
                                      w-full
                                      px-5
                                      py-3
                                      text-sm
                                      font-medium
                                      leading-5
                                      text-white text-gray-700
                                      transition-colors
                                      duration-150
                                      border border-gray-300
                                      rounded-lg
                                      dark:text-gray-400
                                      sm:px-4
                                      sm:py-2
                                      sm:w-auto
                                      active:bg-transparent
                                      hover:border-gray-500
                                      focus:border-gray-500
                                      active:text-gray-500
                                      focus:outline-none
                                      focus:shadow-outline-gray
                                    ">
    Cancelar
  </a>
  <button type="submit" class="
                                      w-full
                                      px-5
                                      py-3
                                      text-sm
                                      font-medium
                                      leading-5
                                      text-white
                                      transition-colors
                                      duration-150
                                      bg-purple-600
                                      border border-transparent
                                      rounded-lg
                                      sm:w-auto
                                      sm:px-4
                                      sm:py-2
                                      active:bg-purple-600
                                      hover:bg-purple-700
                                      focus:outline-none
                                      focus:shadow-outline-purple
                                    ">
    Aceptar
  </button>
</footer>
