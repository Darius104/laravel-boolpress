<template>
    <div class="container">
            <h2>Non siamo riusciti a trovare il contenuto :( </h2> 

            <router-link class="nav-link" :to="{ name: 'blog' }">Torna al blog per leggere i contenuti</router-link>
        </div>
</template>

<script>
export default {
    name: 'Error404'
}
</script>