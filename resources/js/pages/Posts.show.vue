<template>
  <div v-if="post">
    <section class="h-96 flex justify-center p-5 bg-cyan-100">
      <img class="h-full w-1/2 object-cover" :src="`/storage/${post.cover}`" alt="">
    </section>
    <section>
      <div>
        <h1 class="text-center text-2xl font-semibold text-slate-900 mb-5">{{ post.title }}</h1>
        <p class="text-xl text-center">{{ post.content }}</p>
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
        const { post } = res.data
        this.post = post
      }).catch(err => {
        console.log(err)
      })
    }
  },
  beforeMount() {
    this.fetchPost()
  }
}
</script>

<style>

</style>