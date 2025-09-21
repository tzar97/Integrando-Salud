<script setup>
import { Link, router } from '@inertiajs/vue3'
import { ref } from 'vue'


const props = defineProps({
  pacientes: Object,
  filtro: Object
})



  const apellido = ref(props.filtro?.apellido || '')
  const dni = ref(props.filtro?.dni || '')

  const buscar = () => {
    router.get(route('pacientes.listado'), {
      apellido: apellido.value,
      dni: dni.value
    }, {
      preserveState: true,
      replace: true,})
  }



</script>

<template>
  <div class="p-10 max-w-5xl mx-auto">
    
    <div v-if="$page.props.flash.success"
         class="mb-4 p-3 rounded bg-green-100 text-green-800 border border-green-300 text-center">
      {{ $page.props.flash.success }}
    </div>

    <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">
    Listado de Pacientes
    </h1>

    
      <div class="mb-6 flex justify-center gap-4">
        <input
          v-model="apellido"
          type="text"
          placeholder="Buscar por apellido"
          class="border rounded px-3 py-2 w-64"
        />
        <input
          v-model="dni"
          type="text"
          placeholder="Buscar por DNI"
          class="border rounded px-3 py-2 w-64"
        />
        <button
          @click="buscar"
          class="bg-sky-600 text-white px-4 py-2 rounded hover:bg-sky-700 transition">
          Buscar
        </button>
      </div>

    
    <div class="overflow-x-auto bg-white rounded-lg shadow">
      <table class="w-full text-left border-collapse">
        <thead>
          <tr class="bg-sky-100 text-gray-800 uppercase text-sm">
            <th class="p-3">Nombre</th>
            <th class="p-3">Apellido</th>
            <th class="p-3">DNI</th>
            <th class="p-3">Sexo</th>
            <th class="p-3">Fecha Nac.</th>
            <th class="p-3 text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="pac in pacientes.data"
            :key="pac.id"
            class="border-b hover:bg-sky-50 transition"
          >
            <td class="p-3">{{ pac.nombre }}</td>
            <td class="p-3">{{ pac.apellido }}</td>
            <td class="p-3">{{ pac.dni }}</td>
            <td class="p-3">{{ pac.sexo }}</td>
            <td class="p-3">{{ pac.fecha_nacimiento }}</td>
            <td class="p-3 text-center space-x-2">
              <Link
                :href="route('pacientes.edit', pac.id)"
                class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 transition"
              >
                ✏️ Editar
              </Link>
              <Link
                :href="route('tratamientos.index', pac.id)"
                class="bg-purple-500 text-white px-3 py-1 rounded hover:bg-purple-600 transition"
              >
                💊 Tratamientos
              </Link>
            </td>
          </tr>
        </tbody>
      </table>
    </div>


    

    <!-- paginacion -->
    <div class="mt-6 flex justify-center gap-2">
      <Link
        v-for="link in pacientes.links"
        :key="link.label"
        v-html="link.label"
        :href="link.url || '#'"
        class="px-3 py-1 rounded border"
        :class="{
          'bg-sky-600 text-white': link.active,
          'text-gray-600 hover:bg-sky-50': !link.active
        }"
      />
    </div>
  </div>
</template>
