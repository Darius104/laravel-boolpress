<template>
    <div class="container">
        <h2>{{post.title}}</h2>

        <div v-if="post.category">
            Category: {{post.category.name}}
        </div>

        <div v-if="post.tags.length > 0">
            <span v-for="tag in post.tags" :key="tag.id" class="badge bg-warning text-dark mx-1">{{tag.name}}</span>
        </div>

        <p>{{post.content}}</p>
    </div>
</template>

<script>
export default {
    name: 'PostDetails',
    data: function(){
        return {
            post: []
        }
    },
    methods: {
        getPost(){
            axios.get('/api/posts/' + this.$route.params.slug)
            .then((response) => {

                if(response.data.success){
                    this.post = response.data.results
                }else{
                    this.$router.push({name: 'error404'})
                }
            });
        }
    },
    created: function(){
        this.getPost();
    }
}
</script>