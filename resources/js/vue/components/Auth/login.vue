<template>

    <div class="min-h-screen flex flex-col sm:justify-center items-center bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-6 bg-white shadow-md overflow-hidden sm:rounded-md">
            <form @submit.prevent="submit">
                <h2 class="mt-3 mb-6 text-center text-3xl tracking-tight font-bold text-gray-900">
                    Sing in to your account
                </h2>
                <o-field label="Email" :variant="errors.login ? 'danger' : 'primary'" message="">
                    <o-input  expanded="true" placeholder="Introduce tu email" v-model="form.email">

                    </o-input>
                </o-field>

                <o-field label="Contraseña" :variant="errors.login ? 'danger' : 'primary'" :message="errors.login">
                    <o-input expanded="true" v-model="form.password" type="password">

                    </o-input>
                </o-field>

                <o-button :disabled="disableSubmit" class="float-right" variant="primary" native-type="submit">
                    Enviar
                </o-button>

            </form>
        </div>
    </div>  
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
            this.disableSubmit = true
            this.clearErrorsForm();
            this.$axios.post('/api/user/login',this.form)
            .then((res)=>{
                //this.$root.setCookieAuth({key:"test"});
                setTimeout(()=>{
                    this.disableSubmit=false;
                    window.location.href="/vue";
                },1500);
                this.$oruga.notification.open({
                    message: 'Login success.',
                    position: "bottom-right",
                    duration: 4000,
                    closable: true
                })
            }).catch((error)=>{
                console.log(error)
                this.disableSubmit=false
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
            },
            disableSubmit:false,
        }
    }
}
</script>