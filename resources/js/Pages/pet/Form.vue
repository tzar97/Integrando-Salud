<script setup>
import { useForm } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'

// Props: si llega un tipo ya cargado → es edición, si no → alta
const props = defineProps({
  tipo: {
    type: Object,
    default: null
  }
})


const form = useForm({
  nombre: props.tipo?.nombre || '',
  color: props.tipo?.color || '',
  intensidad: props.tipo?.intensidad || 1,
  duracion_min: props.tipo?.duracion_min || '',
  requiere_ayuno: props.tipo?.requiere_ayuno ?? false,
  observaciones: props.tipo?.observaciones || ''
})

// submit dinámico: create o update
const submit = () => {
  if (props.tipo) {
    form.put(route('pet.update', props.tipo.id))
  } else {
    form.post(route('pet.store'))
  }
}
</script>

<template>
  <div class="p-10 max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold mb-6 text-center">
      {{ props.tipo ? 'Modificar Tipo de PET' : 'Alta de Tipo de PET' }}
    </h1>

    <form @submit.prevent="submit" class="flex flex-col gap-4">
   
      <input v-model="form.nombre" type="text" placeholder="Nombre descriptivo"
             class="border rounded p-2" />

      
      <select v-model="form.color" class="border rounded p-2">
        <option disabled value="">Seleccione color</option>
        <option value="verde">🟢 Verde</option>
        <option value="amarillo">🟡 Amarillo</option>
        <option value="ambar">🟠 Ámbar</option>
        <option value="rojo">🔴 Rojo</option>
      </select>

      <label class="text-left text-gray-600">Intensidad (1 - 10)</label>
      <input v-model="form.intensidad" type="range" min="1" max="10"
             class="w-full" />

     
      <input v-model="form.duracion_min" type="number" min="1" max="1440"
             placeholder="Duración en minutos" class="border rounded p-2" />


      <div class="flex items-center gap-2">
        <input v-model="form.requiere_ayuno" type="checkbox" id="ayuno" />
        <label for="ayuno">Requiere ayuno</label>
      </div>

    
      <textarea v-model="form.observaciones" placeholder="Observaciones..."
                class="border rounded p-2"></textarea>

     
      <button type="submit"
              class="bg-sky-600 text-white py-2 rounded hover:bg-sky-700 transition">
        {{ props.tipo ? 'Guardar Cambios' : 'Crear PET' }}
      </button>
    </form>

    
    <div v-if="Object.keys(form.errors).length" class="mt-4 text-red-600">
      <p v-for="(msg, field) in form.errors" :key="field">{{ msg }}</p>
    </div>

    
    <div v-if="$page.props.flash.ok"
         class="mt-4 p-3 bg-green-100 text-green-800 border border-green-300 rounded">
      {{ $page.props.flash.ok }}
    </div>


    <div class="mt-8 flex justify-center">
      <Link
        :href="route('menu')"
        class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600 transition"
      >
        ⬅️ Volver al Menú
      </Link>
    </div>

  </div>
</template>
