<template>
  <div style="padding: 1rem;">
    <section>
      <h1 class="text-2xl font-semibold text-slate-900 text-center mb-5"> {{ title }} </h1>
    </section>

    <section>
      <div class="grid grid-cols-3 gap-6 justify-center">
        <PostCard v-for="post in posts" :key="post.id" :post="post"/>
      </div>
    </section>
  </div>
</template>

<script>

import PostCard from '../components/postCard.vue'
export default {
  components: { PostCard },
  
  data() {
      return {
        title: 'Welcome back Javascript-Vue',
        posts: []
      }
    },
    methods: {
      fetchPosts() {
        axios.get('/api/posts').then((res) => {
          const { posts } = res.data
          this.posts = posts
        })
      }
    },
    beforeMount() {
      this.fetchPosts();
    }
}
</script>

<style>

</style>