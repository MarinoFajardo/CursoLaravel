<template>
    <div>
        <nav class="bg-white border-b border-gray-100">
            <header class="max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40" height="35" viewBox="0 0 262 227">
                            <g id="Vue.js_logo_strokes" fill="none" fill-rule="evenodd">
                                <g id="Path-2">
                                <polyline class="outer" stroke="#4B8" stroke-width="46" points="12.19 -24.031 131 181 250.351 -26.016" />
                                </g>
                                <g id="Path-3" transform="translate(52)">
                                <polyline class="inner" stroke="#354" stroke-width="42" points="15.797 -14.056 79 94 142.83 -17.863" />
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="w-full flex py-4 px-4 sm:px-6 justify-between items-center">
                        
                        <div class="flex h-8 items-center">
                            <router-link class="inline-flex uppercase border-b-2 text-sm leading-5 mx-3 px-4 py-1 text-gray-600 text-center font-bold hover:text-gray-900 hover:border-l-gray-700 duration-150 transition-all hover:-translate-y-1" 
                            v-if="!$root.isloggedin" :to="{name:'login'}">Login</router-link>

                            <router-link class="inline-flex uppercase border-b-2 text-sm leading-5 mx-3 px-4 py-1 text-gray-600 text-center font-bold hover:text-gray-900 hover:border-l-gray-700 duration-150 transition-all hover:-translate-y-1" 
                            v-if="$root.isloggedin" :to="{name:'list'}">Post</router-link>

                            <o-button v-if="$root.isloggedin" variant="danger" @click="logout">Logout</o-button>
                        </div>

                        <div class="flex flex-col items-center" v-if="$root.isloggedin">
                            <div class="rounded-full w-9 h-9 bg-blue-300 text-center p-1 font-bold">
                                {{ $root.user.name.substr(0,2).toUpperCase() }}
                            </div>
                            <p>
                                {{ $root.user.name }}
                            </p>
                        </div>
                    </div>
                </div>

            </header> 
        </nav>

        <router-view>

        </router-view>
    </div>
</template>

<script>
import { root } from 'postcss';

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

