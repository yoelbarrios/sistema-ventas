<div class="mt-4 mb-6">
                                <p class="
                                      mb-2
                                      text-lg
                                      font-semibold
                                      text-gray-700
                                      dark:text-gray-300
                                    ">
                                    Agregar Cliente
                                </p>
                                <!-- Modal inputs -->
                                <label class="block mt-4 text-sm">
                              <span class="text-gray-700 dark:text-gray-400">
                                  Nombre
                              </span>
                              <input id="nombre" name="nombre" value="{{isset($cliente->nombre)?$cliente->nombre:''}}" required
                              class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="" />


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
                                  Número de documento
                              </span>
                              <input type="number" id="num_documento" name="num_documento" value="{{isset($cliente->num_documento)?$cliente->num_documento:''}}" required
                              class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="" />

                          </label>
                          <label class="block mt-4 text-sm">
                              <span class="text-gray-700 dark:text-gray-400">
                                  Dirección
                              </span>
                              <input id="direccion" name="direccion" value="{{isset($cliente->direccion)?$cliente->direccion:''}}" required
                              class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="" />

                          </label>
                          <label class="block mt-4 text-sm">
                              <span class="text-gray-700 dark:text-gray-400">
                                  Teléfono
                              </span>
                              <input id="telefono" name="telefono" value="{{isset($cliente->telefono)?$cliente->telefono:''}}" required
                              class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="" />

                          </label>
                          <label class="block mt-4 text-sm">
                              <span class="text-gray-700 dark:text-gray-400">
                                  Email
                              </span>
                              <input type="email" id="email" name="email" value="{{isset($cliente->email)?$cliente->email:''}}" required
                              class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="" />

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
                                <a href="{{url()->previous()}}"
                                    class="
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
