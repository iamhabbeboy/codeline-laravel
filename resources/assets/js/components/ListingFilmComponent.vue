<template>
    <div class="Listing">

        <div v-for="film in films" >
            <h3>
                <router-link :to="{ name: 'single', params: { slug: film.slug } }" class="btn btn-xs btn-default">
                    {{ film.name }}
                </router-link>
            </h3>
            <p>{{ film.description}} </p>
            <p> Genre: {{ film.genre }}</p>
            <p> Release Year: {{ film.release_date }}</p>
            <p> Country: {{ film.country }}</p>
            <p>Rating: {{ film.rating }}</p>
        </div>
        <paginate
            :page-count="pageCount"
            :click-handler="fetch"
            :prev-text="'Prev'"
            :next-text="'Next'"
            :container-class="'pagination'">
        </paginate>
        <router-link to="/film" class="btn btn-default">Back</router-link>
    </div>
</template>

<style>
    /* .fade-enter-active, .fade-leave-active {
      transition: opacity .5s
    }
    .fade-enter, .fade-leave-active {
      opacity: 0
    } */
    /* .pagination {
        display: inline-block;
    } */
    .pagination {
        margin-top: 10px;
        padding: 0px;
    }
    .pagination > li {
        display: inline;
        padding: 5px;
        border: 1px solid #ccc;
    }
</style>

<script>

    export default{
         data() {
            return {
                films : [],
                pageCount: 1,
                endpoint: '/films?page='
            }
        },
        methods: {
            fetch(id = 1) {
                const endpoint = '/films?page=';
                let app = this;
                this.axios.get(endpoint + id)
                    .then(function (resp) {
                        app.films = resp.data.data;
                        app.pageCount = resp.data.last_page;
                    })
                    .catch(function (err) {
                       console.log(err)
                    });
            }
        },
        created() {
            this.fetch();
        }

    }
</script>