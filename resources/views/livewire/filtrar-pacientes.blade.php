<div class=" py-10">
    <h2 class="text-xl md:text-3xl text-gray-600 text-center font-extrabold my-5">Buscar y Filtrar amigos pacientes</h2>

    <div class="max-w-7xl mx-auto ">
        <form
        wire:submit.prevent="leerDatosFormulario"
        class="flex flex-col md:flex-row  md:justify-between items-center"
        >
            <div class="flex gap-5">
                <div class="mb-5">
                    <label
                        class="block mb-1 text-sm text-gray-700 uppercase font-bold "
                        for="termino">Nombre de paciente
                    </label>
                    <input
                        id="termino"
                        type="text"
                        placeholder="Buscar por nombre"
                        class="inline-block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-96"
                        wire:model="termino"
                    />
                </div>




            </div>


            <div class="flex justify-end">
                <input
                    type="submit"
                    class="bg-indigo-500 hover:bg-indigo-600 transition-colors text-white text-sm font-bold px-10 py-2 rounded cursor-pointer uppercase w-full md:w-auto"
                    value="Buscar"
                />
            </div>

        </form>
    </div>
</div>
