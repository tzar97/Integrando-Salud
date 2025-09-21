<script setup>
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const form = reactive({
  nombre: '',
  apellido: '',
  sexo: '',
  dni: '',
  fecha_nacimiento: ''
})

const submit = () => {
  router.post('/pacientes', form, {

    onSuccess: () => {
      

      form.nombre = ''
      form.apellido = ''
      form.sexo = ''
      form.dni = ''
      form.fecha_nacimiento = ''
    }
  })
}
</script>

<template>
  <div class="p-10 max-w-lg mx-auto text-center">
    <h1 class="text-2xl font-bold mb-6">Alta de Paciente</h1>

    
    <div v-if="$page.props.flash.Exito" class="text-green-600">
        {{ $page.props.flash.Exito }}
    </div>


    
    <form @submit.prevent="submit" class="flex flex-col gap-4">
      <input v-model="form.nombre" type="text" placeholder="Nombre" class="border rounded p-2" />
      <input v-model="form.apellido" type="text" placeholder="Apellido" class="border rounded p-2" />
      
      <select v-model="form.sexo" class="border rounded p-2">
        <option disabled value="">Seleccione sexo</option>
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
        <option value="X">Otros</option>
      </select>

      <input v-model="form.dni" type="text" placeholder="DNI" class="border rounded p-2" />
      <input v-model="form.fecha_nacimiento" type="date" class="border rounded p-2" />

      <button type="submit"
              class="bg-sky-100 border border-sky-300 text-gray-800 py-4 px-6 rounded-lg shadow hover:bg-sky-200 transition text-center">
        Guardar Paciente
      </button>
    </form>

    
    
  
  </div>
</template>
