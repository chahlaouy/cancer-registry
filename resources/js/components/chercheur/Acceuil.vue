<template>
    <div>
        <ModalComponent :patient="patient"></ModalComponent>
        <div class="card text-center">
        <div class="card-header">
            Patient Detailles
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Sexe</th>
                        <th scope="col">Age</th>
                        <th scope="col">Addresse</th>
                        <th scope="col">Lieu Naisance</th>
                        <th scope="col">Afficher Plus D'infromation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="patient in patients" :key="patient.id" >
                        <th scope="row">{{patient.id}}</th>
                        <td>{{patient.sexe}}</td>
                        <td>{{patient.age}}</td>
                        <td>{{patient.adresse}}</td>
                        <td>{{patient.lieu_naisance}}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#showPatient" @click="bindPatient(patient)">
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>


        </div>
        <div class="card-footer text-muted">
            liste des patients
        </div>
        </div>
    </div>
</template>
<script>
import ModalComponent from './ModalComponent'

export default {
    name: 'Home',
    data(){
        return {
            patient: null,
            patients: [], 
        }
    },
    components: {
        ModalComponent,
        
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