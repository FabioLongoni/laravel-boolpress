<template>
  <div style="padding: 1rem;">
    <section>
      <h1 class="text-2xl font-semibold text-slate-900 text-center mb-5"> {{ title }} </h1>
    </section>

    <section>
      <div class="grid grid-cols-3 gap-6 justify-center">
        <router-link :to="{ name: 'posts.show', params: { slug: post.slug }}" v-for="post in posts" :key="post.id" >
          <PostCard :post="post"/>
        </router-link>
      </div>

      <div class="container pt-12">
        <ul class="flex gap-6 justify-center">
          <li v-if="currentPage !== 1" @click="fetchPosts(1)" :class="{
            'w-8 h-8 flex items-center justify-center rounded-full': true,
            'bg-gray-100 cursor-pointer hover:bg-cyan-600': true
          }">
        ...  
        </li>

          <li @click="fetchPosts(page)" :class="{
            'w-8 h-8 flex items-center justify-center rounded-full': true,
            'bg-cyan-600 text-white': page === currentPage,
            'bg-gray-100 cursor-pointer hover:bg-cyan-600': page !== currentPage
          }" v-for="page in lastPage" :key="page">{{ page }}</li>

          <li v-if="currentPage !== lastPage" @click="fetchPosts(lastPage)" :class="{
            'w-8 h-8 flex items-center justify-center rounded-full': true,
            'bg-gray-100 cursor-pointer hover:bg-cyan-600': true
          }">
        ...  
        </li>
        </ul>
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
        posts: [],
        currentPage: 1,
        lastPage: 0,
        total: 0
      }
    },
    methods: {
      fetchPosts(page = 1) {
        axios.get('/api/posts', {
          params: {
            page: page
          }
        }).then((res) => {
          // console.log(res.data)
          const { data, current_page, last_page, total } = res.data.result
          
          this.posts = data
          this.lastPage = last_page
          this.currentPage = current_page
          this.total = total
          // const { posts } = res.data
          // this.posts = posts
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