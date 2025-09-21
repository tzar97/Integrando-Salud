<script setup>
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
  pacienteId: Number,
  tipos: Array 
})

const form = reactive({
  tipo_pet_id: '',
  fecha_inicio: ''
})

const submit = () => {
  router.post(`/pacientes/${props.pacienteId}/tratamientos`, form)
}
</script>

<template>
  <div class="p-6 max-w-lg mx-auto">
    <h1 class="text-xl font-bold mb-4">Nuevo Tratamiento</h1>
    <form @submit.prevent="submit" class="flex flex-col gap-4">
      
    


      <select v-model="form.tipo_pet_id" class="border rounded p-2">
        <option disabled value="">Seleccione tipo de PET</option>
        <option v-for="t in props.tipos" :key="t.id" :value="t.id">
          {{ t.nombre }}
        </option>
      </select>

      



      <input type="date" v-model="form.fecha_inicio" class="border rounded p-2" />

      <button type="submit" class="bg-sky-600 text-white py-2 px-4 rounded">
        Guardar
      </button>
    </form>
  </div>
</template>
