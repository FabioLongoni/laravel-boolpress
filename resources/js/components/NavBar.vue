<template>
  <header class="bg-cyan-600">
    <nav class="text-white">
      <div class="flex justify-around items-center">
        <div>
          LOGO
        </div>
        <ul class="flex items-center">
          <li class="px-2 py-1 hover:bg-teal-800" v-for="(link,i) in navLinks" :key="i">
            <router-link :to="{ name: link.routeName }">{{ link.text }}</router-link>
          </li>
          <!-- <li class="px-2 py-1 hover:bg-amber-200" >
            <router-link :to="{ name: 'posts.index' }">Posts</router-link>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
</template>

<script>
export default {
  data() {
    return {
      navLinks: [
        {
          text: 'Home',
          routeName: 'home'
        },
        {
          text: 'Chi siamo',
          routeName: 'about-us'
        },
        {
          text: 'Posts',
          routeName: 'posts.index'
        },
        {
          text: 'Contatti',
          routeName: 'contact-us'
        },
      ]
    }
  }
}
</script>

<style lang="scss" scoped>
  
</style>