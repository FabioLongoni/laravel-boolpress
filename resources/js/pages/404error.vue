<template>
  <section>
    <div class="text-center m-20 p-20 border border-stone-400 bg-orange-400">
      <h1 class="text-[100px]">404</h1>
      <p class="text-xl">La pagina selezionata è inesistente. <router-link class="text-cyan-600" :to="{ name: 'home'}" >torna alla home</router-link></p>
    </div>
  </section>
</template>

<script>
export default {

}
</script>

<style>

</style>