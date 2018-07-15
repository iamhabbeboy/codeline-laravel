<template>
    <div>
        <h3> {{ details.name }} </h3>
        <p> Description: {{ details.description }}</p>
        <p> Release Date: {{ details.release_date }}</p>
        <p> Genre: {{ details.genre }}</p>
        <p> Country: {{ details.country}}</p>
        <span v-if="status=='failed'">
            <a href="/login" style="cursor:pointer;font-weight:bold;color: blue">
                Login before posting comment
            </a>
        </span>
        <p></p>

        <div v-show="status=='success'">
            <form method="POST" @submit.prevent="comment(details.id)">
                <label for="">Name</label>
                <p></p>
                <input type="text" v-model="comments.username" class="form-control" name="username" required>
                <p></p>
                <label> Comment </label>
                <p></p>
                <textarea name="comment" v-model="comments.comment" cols="50" rows="10" class="form-control" required></textarea>
                <p></p>
                <button type="submit"> submit </button>
            </form>
        </div>
    </div>
</template>

<style>
</style>

<script>
    export default {
        mounted() {
            const _slug = this.$route.params.slug;
            this.fetch_single(_slug);
            this.authentication();
        },
        data() {
            return {
                details: [],
                status: 'failed',
                comments: {
                    username: '',
                    comment: ''
                }
            }
        },
        methods: {
            fetch_single(slug) {
                let app = this;
                this.axios.get(`/films/film-${slug}`)
                    .then( function(resp) {
                        if( resp.status != 200 ) {
                            return alert('Error occured, try again...');
                        }
                        app.details = resp.data[0];
                    })
                    .catch( function(err) {
                        console.log(err);
                    })
            },
            authentication() {
                const app = this;
                this.axios.get('/films/auth')
                    .then(function(resp) {
                        const data  = resp.data.status;
                        app.status  = data;
                    })
                    .catch(function(err) {
                        console.log(err)
                    })
            },
            comment(id) {
                const data = this.comments;
                this.axios.post(`/films/comment/${id}`, data)
                        .then(function(resp) {
                            console.log(resp)
                        })
                        .catch(function(err) {

                        })
            }
        }

    }
</script>
