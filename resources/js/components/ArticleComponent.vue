<template>
<div class="row mt-5">
<div class="col-12 p-3">
    <img :src="article.img" class="border rounded mx-auto d-block" alt="...">
    <h3 class="mt-5">{{article.title}}</h3>
    <p class="card-text">{{article.body}}</p>

    <div class="mt-3 d-flex d-flex justify-content-around">
        <h4>
        <span class="tag bg-danger" v-for="(tag,index) in article.tags">
            <span v-if="tagsLen == (index+1)">{{tag.label}}</span>
            <span v-else>{{tag.label}} | </span>
        </span>
        </h4>
        <h4>Опубликованно:  <i>{{article.created_at}}</i></h4>
    </div>
    <div class="mt-3 d-flex d-flex justify-content-around">
        <views-component></views-component>
        <likes-component></likes-component>
    </div>
</div>
</div>
</template>

<script>
import { mapState }  from 'vuex'

export default {
    computed: mapState({
        // article: 'article',
        article: state => state.article.article,
        tagsLen: state => state.article.article.tags.length,
    }),
    mounted() {
        console.log('Component article mounted.')
    }
}
</script>

<style scoped>


</style>
