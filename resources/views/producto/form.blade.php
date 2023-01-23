<div class="mt-4 mb-6">
  <p class="
                                      mb-2
                                      text-lg
                                      font-semibold
                                      text-gray-700
                                      dark:text-gray-300
                                    ">
    Agregar Producto
  </p>
  <!-- Modal inputs -->
  <label class="block mt-4 text-sm">
    <span class="text-gray-700 dark:text-gray-400">
      Nombre
    </span>
    <input id="nombre" name="nombre" value="{{isset($producto->nombre)?$producto->nombre:''}}" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="" />
    <span class="text-xs text-gray-600 dark:text-gray-400">
      El nombre del producto solo puede contener letras.
    </span>
  </label>
  <label class="block mt-4 text-sm">
    <span class="text-gray-700 dark:text-gray-400">
      Codigo
    </span>
    <input id="codigo" name="codigo" value="{{isset($producto->codigo)?$producto->codigo:''}}" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="" />
  </label>
  <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Categoria
                </span>
                <select name="idcategoria"
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                >
                @foreach($categorias as $cat)
                  <option  value="{{$cat->id}}">{{$cat->nombre}}</option>
                @endforeach
                </select>
  </label>
  <label class="block mt-4 text-sm">
    <span class="text-gray-700 dark:text-gray-400">
      Precio
    </span>
    <input id="precio" name="precio" value="{{isset($producto->precio)?$producto->precio:''}}" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="" />
  </label>

  <label class="block mt-4 text-sm">
    <span class="text-gray-700 dark:text-gray-400">
      Stock
    </span>
    <input id="stock" name="stock" value="{{isset($producto->stock)?$producto->stock:''}}" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="" />
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
