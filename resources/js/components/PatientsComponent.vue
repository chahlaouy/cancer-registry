<template>
    <div class="container">
      
        <modal-tumeur :id="id"></modal-tumeur>
        <modal-hopital :id="id"></modal-hopital>
        <modal-suivie :id="id"></modal-suivie>
        
        <div class="clearfix">
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Liste patient</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 600px;">
                <table class="table table-head-fixed">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nom</th>
                      <th>Prénom</th>
                      <th>Sexe</th>
                      <th>Age</th>
                      <th>Addresse</th>
                      <th>CIN</th>
                      <th>Lieu Naisance</th>
                      <th>Ajouter Nouveau Tumuer</th>
                      <th>Ajouter Nouveau Suivie</th>
                      <th>Ajouter Nouveau Hopital</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="patient in patients" :key="patient.id" >
                      <td>{{patient.id}}</td>
                      <td>{{patient.nom}}</td>
                      <td>{{patient.prenom}}</td>
                      <td>{{patient.sexe}}</td>
                      <td>{{patient.age}}</td>
                      <td>{{patient.adresse}}</td>
                      <td>{{patient.cin}}</td>
                      <td>{{patient.lieu_naisance}}</td>
                      <td>
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddTumeur" @click="setPatienId(patient.id)">
                            <i class="fas fa-plus"></i>
                          </button>
                      </td>
                      <td>
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddSuivie" @click="setPatienId(patient.id)">
                            <i class="fas fa-plus"></i>
                          </button>
                      </td>
                      <td>
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddHopital" @click="setPatienId(patient.id)">
                            <i class="fas fa-plus"></i>
                          </button>
                      </td>
                    </tr>
                    
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
    </div>
</template>

<script>
import ModalHopital from './modals/ModalHopital'
import ModalSuivie from './modals/ModalSuivie'
import ModalTumeur from './modals/ModalTumeur'

    export default {
        name: 'UsersComponent',
        data(){
            return {
                patients: [], 
                id: null
                // form: new Form({
                //     nom: '',
                //     prenom: '',
                //     profession: '',
                //     sexe: '',
                //     age: '',
                //     adresse: '',
                //     cin: '',
                //     date_naissance: '',
                //     lieu_naisance: '',
                //     num_securite_sociale: '',
                //     hopital: '',
                //     num_laboratoire: '',
                //     num_cas: '',
                //     unite: '',
                //     nom_tumeur: '',
                //     diagnostic_de_base: '',
                //     topographie: '',
                //     morphologie: '',
                //     comportement_tumoral: '',
                //     differenciation_histologique: '',
                //     classification_TNM: '',
                //     extension: '',
                //     siege_metastase: '',
                //     date_incidence: '',
                //     date_derniere_contact: '',
                //     statut: '',
                // })
            }
        },
        components: {
            ModalTumeur,
            ModalSuivie,
            ModalHopital
        },
        methods: {
            getPatients(){
                axios.get('api/patient').then(({data}) => {
                    this.patients = data;
                    console.log(this.patients)
                })
            },
            setPatienId(id){
              this.id = id
            } 
        },
        created(){
            this.getPatients();
        }
    }
</script>
