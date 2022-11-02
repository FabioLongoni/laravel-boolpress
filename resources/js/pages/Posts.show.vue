<template>
  <div>
    <section>
      <div>
        <h1 class="text-center text-2xl font-semibold text-slate-900 mb-5">Pagina di dettaglio</h1>
        <p class="text-xl text-center">{{ slug }}</p>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  props: ['slug'],
  data() {
    return {
      post: null
    }
  },
  methods: {
    fetchPost() {
      axios.get(`/api/posts/${this.slug}`).then(res=> {
        console.log(res.data)
      }).catch(err => {
        console.log(err)
      })
    }
  },
  beforeMount() {
    this.fetchPosts()
  }
}
</script>

<style>

</style>