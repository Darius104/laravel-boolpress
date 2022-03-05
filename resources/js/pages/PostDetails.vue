<template>
    <div class="container">
        <h2>{{post.title}}</h2>

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