<template>
  <section>
    <div class="container">
      <h1>I nostri post</h1>
      <!-- SINGLE CARD -->
      <div class="row row-cols-3">
        <div v-for="post in posts" :key="post.id" class="col">
          <div class="card my-3">
            <img v-if="post.cover" :src="post.cover" class="card-img-top" :alt="post.title" />
            <div class="card-body">
              <h5 class="card-title">{{ post.title }}</h5>
              <p class="card-text">
                {{ cutText(post.content, 50) }}
              </p>
              <div>
                <router-link class="nav-link" :to="{ name: 'post-details', params: { slug: post.slug } }">Leggi</router-link>
              </div>
            </div>
          </div>
        </div>
        <!-- END SINGLE CARD -->
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'Posts',
  data: function () {
    return {
      posts: [],
    };
  },
  methods: {
    getPosts: function () {
      axios.get('/api/posts').then((response) => {
        this.posts = response.data.results;
      });
    },
    cutText: function (text, maxCharsNumber) {
      // taglia il testo se è più lungo di 50 caratteri e aggiunge 3 punti alla fine
      if (text.length > maxCharsNumber) {
        return text.substr(0, maxCharsNumber) + '...';
      }
      return text;
    },
  },
  created: function () {
    this.getPosts();
  },
};
</script>