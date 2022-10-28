<template>
  <div style="padding: 1rem;">
    <h1> {{ title }} </h1>
    <ul>
      <li v-for="post in posts" :key="post.id">
        {{post.title}}
      </li>
    </ul>
  </div>
</template>

<script>
  export default {
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

<style lang="scss" scoped>

</style>