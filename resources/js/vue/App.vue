<template>
    <div>

        <header>
           <div class="flex gap-3 bg-gray-200">
                <router-link :to="{name:'login'}">Login</router-link>
                <o-button variant="danger" @click="logout">Logout</o-button>
           </div>
        </header>

        <router-view>

        </router-view>
    </div>
</template>

<script>
    export default{
        data(){
            return{
                isloggedin:false,
                user:'',
                token:''
            }
        },
        created(){
            if(window.Laravel.isloggedin){
                this.isloggedin = true;
                this.user = window.Laravel.user;
                this.token = window.Laravel.token;

            }
        },
        methods:{
            logout(){
                this.$axios.post('/api/user/logout').then(()=>{
                    window.location.href = "/vue/login";
                })
            },
            /*setCookieAut(data){
                this.$cookies.set("auth",data);
            }*/
        }
    }
</script>

