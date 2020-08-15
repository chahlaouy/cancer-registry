<template>
    <div>
        
        <nav-bar></nav-bar>
        <Header />
        <router-view></router-view>
        </div>
</template>

<script>
// import 'materialize-css/dist/css/materialize.min.css'
// import 'material-design-icons/iconfont/material-icons.css'
import Chart from './Chart'
// import M from 'materialize-css'
import Header from './Header'
import ModalComponent from './ModalComponent'
import NavBar from './NavBar'
export default {
    name: 'Home',
    data(){
        return {
            patient: null,
            patients: [], 
        }
    },
    components: {
        Header,
        ModalComponent,
        Chart,
        NavBar
    },
    methods: {
         getPatients(){
                axios.get('api/patient').then(({data}) => {
                    this.patients = data;
                    console.log(this.patients)
                })
            },
        bindPatient(patient){
            this.patient = patient
        }
        },
        created(){
            this.getPatients();
            //  M.AutoInit()
    }

}
</script>