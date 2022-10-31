<template>
  <article class="relative rounded-lg overflow-hidden">
    <img v-if="post.cover" :src="`/storage/${post.cover}`"  alt="">
    <div class="p-4 mt-2">
      <h3 class="font-semibold uppercase">{{ post.title }}</h3>
      <p v-if="post.category" class="text-lime-600 uppercase text-sm font-semibold">{{ post.category.name }}</p>
      <ul class="flex gap-1 py-2">
        <li class="text-xs rounded-full bg-cyan-400 px-3 text-white" v-for="tag in post.tags" :key="tag.id"> {{ tag.name }}</li>
      </ul>
      <p class="text-xs">{{ post.date }}</p>
    </div>
  </article>
</template>

<script>
export default {
  props: {
    post: {
      type: Object,
      required: true
    }
  }
}
</script>

<style lang="scss" scoped>
article {
  box-shadow: -1px 1px 18px 1px rgba(0,0,0,0.56);
}
img {
  max-height: 200px;
  width: 100%;
  object-position: center;
  object-fit: cover;
}

</style>

