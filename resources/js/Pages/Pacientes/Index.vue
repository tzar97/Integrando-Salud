<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
  <div class="p-10 flex flex-col items-center gap-8">
  


    <h1 class="text-4xl font-bold mb-8 text-gray-800">Sistema de Gestión Médico</h1>

   



    <div class="flex flex-col gap-4 w-full max-w-lg">

      <Link
        href="/pacientes/nuevo"
        class="bg-sky-100 border border-sky-300 text-gray-800 py-4 px-6 rounded-lg shadow hover:bg-sky-200 transition text-center"
      >
        ➕ Alta de Pacientes
      </Link>

      <Link
        href="/pacientes/listado"
        class="bg-sky-100 border border-sky-300 text-gray-800 py-4 px-6 rounded-lg shadow hover:bg-sky-200 transition text-center"
      >
        📋 Lista de Pacientes
      </Link>

      <Link
        href="/pet/lista"
        class="bg-sky-100 border border-sky-300 text-gray-800 py-4 px-6 rounded-lg shadow hover:bg-sky-200 transition text-center"
      >
        🧪 Gestión de Tipos de PET
      </Link>

    </div>
  </div>
</template>
