<script setup>
import { Link, router} from '@inertiajs/vue3'


const props = defineProps({
  tipos: Object,
  estado: String
})


const cambiarEstado = (id) => {
  router.patch(route('pet.cambiar-estado', id))}



</script>

<template>
  <div class="p-8">
      <h1 class="text-3xl font-bold mb-6 text-center">Listado de Tipos de PET</h1>

      <div class="flex items-center">
      <label for="estado" class="mr-6 font-medium whitespace-nowrap">Filtrar por estado:</label>
    
    <select
          id="estado"
          class="border rounded-lg shadow p-2 w-72 bg-white"
          :value="props.estado || ''"
          @change="e => router.get(route('pet.index'), { estado: e.target.value })"
        >
          <option value="">Todos</option>
          <option value="alta">Solo activos</option>
          <option value="baja">Solo inactivos</option>
    </select>

</div>





    
   
    <div class="mb-6 text-right">
      <Link
        :href="route('pet.create')"
        class="bg-sky-600 text-white px-4 py-2 rounded shadow hover:bg-sky-700 transition"
      >
        ➕ Agregar Tipo de PET
      </Link>
    </div>




   
    <div class="overflow-x-auto bg-white shadow rounded-lg">
      <table class="w-full text-left border-collapse">
        <thead class="bg-gray-100">
          <tr>
            <th class="p-3 border-b">Nombre</th>
            <th class="p-3 border-b">Color</th>
            <th class="p-3 border-b">Intensidad</th>
            <th class="p-3 border-b">Duración (min)</th>
            <th class="p-3 border-b">Ayuno</th>
            <th class="p-3 border-b">Estado</th>
            <th class="p-3 border-b">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="tipo in tipos.data" :key="tipo.id" class="hover:bg-gray-50">
            <td class="p-3 border-b">{{ tipo.nombre }}</td>
            <td class="p-3 border-b capitalize">{{ tipo.color }}</td>
            <td class="p-3 border-b">{{ tipo.intensidad }}</td>
            <td class="p-3 border-b">{{ tipo.duracion_min }}</td>
            <td class="p-3 border-b">
              {{ tipo.requiere_ayuno ? 'Sí' : 'No' }}
            </td>
            <td class="p-3 border-b">
              <span
                :class="tipo.estado ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800'"
                class="px-2 py-1 rounded text-sm"
              >
                {{ tipo.estado ? 'Activo' : 'Inactivo' }}
              </span>
            </td>
            <td class="p-3 border-b flex gap-2">
              <Link
                :href="route('pet.edit', tipo.id)"
                class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600"
              >
                ✏️ Editar
              </Link>




              <Link
                :href="route('pet.cambiar-estado', tipo.id)"
                method="patch"
                as="button"
                class="bg-gray-500 text-white px-3 py-1 rounded hover:bg-gray-600"
              >
                Cambiar estado
              </Link>






            </td>
          </tr>
        </tbody>
      </table>
    </div>


                <!-- Paginacion -->
    
    <div class="mt-6 flex justify-center space-x-2">
      <Link
        v-for="link in tipos.links"
        :key="link.url"
        :href="link.url || ''"
        v-html="link.label"
        class="px-3 py-1 rounded"
        :class="{
          'bg-sky-600 text-white': link.active,
          'text-gray-600 hover:bg-gray-100': !link.active && link.url
        }"




      />
    </div>
  </div>
</template>
