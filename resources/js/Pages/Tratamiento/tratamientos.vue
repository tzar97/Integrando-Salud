<script setup>
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  paciente: Object,
  tratamientos: Array
})
</script>

<template>
  <div class="p-8">
    <h1 class="text-2xl font-bold mb-4">
      Tratamientos de {{ paciente.nombre }} {{ paciente.apellido }}
    </h1>

    

    <div class="mb-4 text-right">
      <Link
        :href="route('tratamientos.create', paciente.id)"
        class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700"
      >
        ➕ Nuevo Tratamiento
      </Link>
    </div>




    
    <table class="w-full border">
      <thead class="bg-gray-100">
        <tr>
          <th class="p-2 border">Tipo PET</th>
          <th class="p-2 border">Fecha de inicio</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="t in tratamientos" :key="t.id" class="hover:bg-gray-50">
          <td class="p-2 border">{{ t.tipo_pet?.nombre }}</td>
          <td class="p-2 border">{{ t.fecha_inicio }}</td>
          <td class="p-2 flex gap-2"></td>




          <Link
              :href="route('tratamientos.destroy', { paciente: props.paciente.id, tratamiento: t.id })"
              method="delete"
              as="button"
              class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
            >
              🗑️ Eliminar
        </Link>



        
        </tr>
      </tbody>
    </table>
  </div>
</template>
