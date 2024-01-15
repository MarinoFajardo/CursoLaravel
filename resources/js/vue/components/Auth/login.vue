<template>
    <form @submit.prevent="submit">
        <o-field label="Email" :variant="errors.login ? 'danger' : 'primary'" message="">
            <o-input v-model="form.email">

            </o-input>
        </o-field>

        <o-field label="Contraseña" :variant="errors.login ? 'danger' : 'primary'" :message="errors.login">
            <o-input v-model="form.password" type="password">

            </o-input>
        </o-field>

        <o-button variant="primary" native-type="submit">
            Enviar
        </o-button>

    </form>
</template>

<script>
export default{
    created(){
        if(this.$root.isloggedin){
            this.$router.push({name:'list'})
        }
    },
    methods:{
        clearErrorsForm(){
            this.errors.login = ""
        },
        submit(){
            this.clearErrorsForm();
            this.$axios.post('/api/user/login',this.form)
            .then((res)=>{
                //this.$root.setCookieAuth({key:"test"});
                setTimeout(()=>(window.location.href="/vue"),1500);
                this.$oruga.notification.open({
                    message: 'Login success.',
                    position: "bottom-right",
                    duration: 4000,
                    closable: true
                })
            }).catch((error)=>{
                console.log(error)
                if(error.response.data){
                    this.errors.login = error.response.data;
                }
            })
        }
    },
    data(){
        return{
            form:{
                email:'',
                password:'',
            },
            errors:{
                login:""
            }
        }
    }
}
</script>