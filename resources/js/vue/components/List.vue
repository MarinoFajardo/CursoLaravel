<template>
    <div class="container mx-auto">

        <div class="mt-6 mb-2 marker:px-6 py-4 bg-white shadow-md rounded-md">
            <o-modal v-model:active="confirmDeleteActive">
                <div class="p-4">
                    <p>¿Seguro que quieres eliminar el registro seleccionado?</p>
                </div>
                <div class="flex flex-row-reverse gap-2 bg-gray-300 p-2">
                    <o-button variant="danger" @click="deletePost()">Eliminar</o-button>
                    <o-button @click="confirmDeleteActive=false">Cancelar</o-button>
                </div>
            </o-modal>

            <h1>Listado de Post</h1>
            <o-button icon-left="plus" @click="$router.push({name:'save'})" >Crear</o-button>
            <div class="mb-5"></div>
            <o-table 
            :loading="isLoading" 
            :data="posts.currentPage && posts.data.length == 0 ? [] : posts.data">

                <o-table-column field="id" label="ID" numeric v-slot='p'>
                    {{ p.row.id }}
                </o-table-column>

                <o-table-column field="title" label="Título" v-slot='p'>
                    {{ p.row.title }}
                </o-table-column>

                <o-table-column field="posted" label="Posteado" v-slot='p'>
                    {{ p.row.posted }}
                </o-table-column>

                <o-table-column field="created_at" label="Fecha" v-slot='p'>
                    {{ p.row.created_at }}
                </o-table-column>

                <o-table-column field="categoria" label="Categoria" v-slot='p'>
                    {{ p.row.categoria.title }}
                </o-table-column>

                <o-table-column field="slug" label="Acciones" v-slot='p'>
                    <router-link class="mr-5" :to="{name:'save',params:{'slug': p.row.slug}}">Editar</router-link>
                    <o-button icon-left="delete" rounded size="small" variant="danger" @click="deletePostRow=p; confirmDeleteActive=true">Eliminar</o-button>
                </o-table-column>

            </o-table>

            <br />
            <o-pagination
            @change = "updatePage"
                v-model:current="currentPage"
                :total="posts.total"
                :range-before="2"
                :range-after="2"
                order="centered"
                size="small"
                :simple="false"
                :rounded="true"
                :per-page="posts.per_page">
            </o-pagination>
    </div>
    
    </div>
</template>

<script>
export default {

    data(){
        return{
            posts: [],
            isLoading: false,
            currentPage: 1,
            confirmDeleteActive:false,
            deletePostRow:""
        }
    },

    methods:{
        updatePage(){
            setTimeout(this.listPage,100);
        },

        listPage(){
            this.$axios.get('/api/post?page='+this.currentPage).then((res) => {
                this.posts = res.data
            });
        },
        deletePost(){
            this.confirmDeleteActive=false
            this.posts.data.splice(this.deletePostRow.index,1)
            this.$axios.delete("/api/post/"+this.deletePostRow.row.id)
            this.confirmDeleteActive=false
            this.$oruga.notification.open({
                message: 'Registro Eliminado',
                position: "bottom-right",
                variant: 'danger',
                duration: 4000,
                closable: true
            })
        }
    },

    async mounted() {
        this.listPage()
    },
};
</script>
