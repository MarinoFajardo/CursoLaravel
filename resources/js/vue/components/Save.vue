<template>
    <h1 v-if="post">Actualizar Post <span>{{ post.title }}</span></h1>
    <h1 v-else>Crear Post</h1>
    <form @submit.prevent="submit">
        <div class="grid grid-cols-2 gap-2">
            <div class="col-span-2">
                <o-field label="Título" :variant="errors.title ? 'danger' : 'primary'" :message="errors.title">
                <o-input v-model="form.title"></o-input>
            </o-field>

            </div>

            <o-field label="Descripción" :variant="errors.description ? 'danger' : 'primary'" :message="errors.description">
                <o-input  v-model="form.description" type="textarea"></o-input>
            </o-field>

            <o-field label="Contenido" :variant="errors.content ? 'danger' : 'primary'" :message="errors.content">
                <o-input  v-model="form.content" type="textarea"></o-input>
            </o-field>

            <o-field label="Categoria" :variant="errors.categoria_id ? 'danger' : 'primary'" :message="errors.categoria_id">
                <o-select  v-model="form.categoria_id" placeholder = "Seleccione una Categoria">
                    <option v-for="c in categorias" v-bind:key="c.id" :value="c.id">{{ c.title }}</option>
                </o-select>
            </o-field>

            <o-field label="Posted" :variant="errors.posted ? 'danger' : 'primary'" :message="errors.posted">
                <o-select  v-model="form.posted" placeholder = "Seleccione un Estado">
                    <option value="yes">Si</option>
                    <option value="not">No</option>
                </o-select>
            </o-field>
        </div>

        <o-button variant="primary" native-type="submit">
            Enviar
        </o-button>
    </form>

</template>

<script>
import { setTransitionHooks } from 'vue'


export default {
    data() {
        return {
            categorias:[],
            form:{
                title:"",
                description:"",
                content:"",
                categoria_id:"",
                posted:""
            },
            errors:{
                title:"",
                description:"",
                content:"",
                categoria_id:"",
                posted:""
            },
            post:""
        }
    },
    async mounted() {
        if(this.$route.params.slug){
            await this.getPost()
            this.initPost()
        }
        this.getCategoria()
    },
    methods: {
        clearErrorsForm(){
            this.errors.title = ""
            this.errors.description = ""
            this.errors.content = ""
            this.errors.categoria_id = ""
            this.errors.posted = ""
        },
        getCategoria(){
            this.$axios.get("/api/categoria/all").then(res =>{
                this.categorias = res.data
            })
        },
        async getPost(){
            this.post = await this.$axios.get("/api/post/slug/"+this.$route.params.slug)
            this.post = this.post.data
        },
        initPost(){
            this.form.title = this.post.title
            this.form.description = this.post.description
            this.form.content = this.post.content
            this.form.categoria_id = this.post.categoria_id
            this.form.posted = this.post.posted
        },
        submit(){
          this.clearErrorsForm()

          //crear
          if(this.post == ""){
            return this.$axios.post("/api/post",this.form).then(res=>{
                this.$oruga.notification.open({
                    message: 'Registro Insertado con éxito.',
                    position: "bottom-right",
                    duration: 4000,
                    closable: true
                })
          }).catch(error => {
            console.log(error.response.data)
            if(error.response.data.title){
                this.errors.title = error.response.data.title[0]
            }
            if(error.response.data.description){
                this.errors.description = error.response.data.description[0]
            }
            if(error.response.data.content){
                this.errors.content = error.response.data.content[0]
            }
            if(error.response.data.categoria_id){
                this.errors.categoria_id = error.response.data.categoria_id[0]
            }
            if(error.response.data.posted){
                this.errors.posted = error.response.data.posted[0]
            }
          })
          }
          //actualizar
          this.$axios.patch("/api/post/"+this.post.id,this.form).then(res=>{
                this.$oruga.notification.open({
                    message: 'Registro Editado con éxito.',
                    position: "bottom-right",
                    duration: 4000,
                    closable: true
                })
          }).catch(error => {
            console.log(error.response.data)
            if(error.response.data.title){
                this.errors.title = error.response.data.title[0]
            }
            if(error.response.data.description){
                this.errors.description = error.response.data.description[0]
            }
            if(error.response.data.content){
                this.errors.content = error.response.data.content[0]
            }
            if(error.response.data.categoria_id){
                this.errors.categoria_id = error.response.data.categoria_id[0]
            }
            if(error.response.data.posted){
                this.errors.posted = error.response.data.posted[0]
            }
          })
        }
    },
}
</script>