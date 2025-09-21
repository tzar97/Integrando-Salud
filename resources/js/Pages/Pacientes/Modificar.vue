<script setup>
import { useForm } from '@inertiajs/vue3'


const props = defineProps({
  paciente: Object
})


const form = useForm({
  nombre: props.paciente.nombre,
  apellido: props.paciente.apellido,
  sexo: props.paciente.sexo,
  dni: props.paciente.dni,
  fecha_nacimiento: props.paciente.fecha_nacimiento
})



const submit = () => {
  form.put(route('pacientes.update', props.paciente.id), {
    onSuccess: () => {
      
    }
  })
}

</script>

<template>
  <div class="p-10 max-w-lg mx-auto text-center">
    <h1 class="text-2xl font-bold mb-6">Modificar Paciente</h1>

    <form @submit.prevent="submit" class="flex flex-col gap-4">
      <input v-model="form.nombre" type="text" placeholder="Nombre" class="border rounded p-2" />
      <input v-model="form.apellido" type="text" placeholder="Apellido" class="border rounded p-2" />

      <select v-model="form.sexo" class="border rounded p-2">
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
        <option value="X">Otros</option>
      </select>

      <input v-model="form.dni" type="text" placeholder="DNI" class="border rounded p-2" />
      <input v-model="form.fecha_nacimiento" type="date" class="border rounded p-2" />

      <button type="submit"
              class="bg-yellow-400 text-white py-2 rounded hover:bg-yellow-500 transition">
        Guardar Cambios
      </button>
    </form>

   
    <div v-if="Object.keys(form.errors || {}).length" class="mt-4 text-red-600">
      <p v-for="(msg, field) in form.errors" :key="field">{{ msg }}</p>
    </div>

    
    <div v-if="$page.props.flash.success"
         class="mt-4 p-3 bg-green-100 text-green-800 border border-green-300 rounded">
      {{ $page.props.flash.success }}
    </div>
  </div>
</template>
