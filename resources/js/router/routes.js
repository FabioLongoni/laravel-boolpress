
import Home from "../pages/Home.vue";
import ContactUs from "../pages/ContactUs.vue";
import AboutUs from "../pages/AboutUs.vue";
import PostsIndex from "../pages/Posts.index.vue";
import PostsShow from "../pages/Posts.show.vue";
import Error404 from "../pages/404error.vue";

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home
  },
  {
    path: "/contatti",
    name: "contact-us",
    component: ContactUs
  },
  {
    path: "/chi-siamo",
    name: "about-us",
    component: AboutUs,
  },
  {
    path: '/posts',
    name: 'posts.index',
    component: PostsIndex
  },
  {
    path: "/posts/:slug",
    name: "posts.show",
    component: PostsShow,
    props: true
  },
  {
    path: '/*',
    name: '404error',
    component: Error404
  },
];

export default routes;