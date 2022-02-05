<template>
    <div class="uk-margin uk-form-width-large">
        <input class="uk-input" type="text" placeholder="Url" v-model="urlText">
        <button class="uk-button uk-button-default" @click="loadUrl()">Submit</button>
        <a v-if="shortUrl" class="uk-label" :href="shortUrl">{{shortUrl}}</a>
        <span v-if="errorUrl" class ="uk-label uk-label-danger">{{errorUrl}}</span>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "Url",
        data() {
            return {
                urlText: null,
                shortUrl: null,
                errorUrl: null
            }
        },
        methods: {
            async loadUrl() {
                this.errorUrl=null;
                this.shortUrl=null;
                axios.post('/addUrl', {url: this.urlText})
                    .then(res => {
                        this.shortUrl = res.data
                    }).catch(error=>{
                    this.errorUrl=error.response.data.errors.url[0]
                })
            }
        }
    }
</script>

<style scoped>

</style>