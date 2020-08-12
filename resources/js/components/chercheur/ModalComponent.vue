<template>
    <div>
        <div class="modal fade" id="showPatient" tabindex="-1" role="dialog" aria-labelledby="showPatientLabel" aria-hidden="true" v-if="patient != null">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="showPatientLabel">Patient Detailles</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                            <h4 class="mt-5">Patient Detailles</h4>
                            <table class="table">
                                <tbody>
                                    <tr>
                                    <th>Id</th>
                                        <td>{{ patient.id}}</td> 
                                    </tr>
                                    <tr>
                                    <th>Nom</th>
                                        <td>{{ patient.nom}}</td>
                                        
                                    </tr>
                                    <tr>
                                    <th>Prenom</th>
                                        <td>{{ patient.prenom}}</td>
                                       
                                    </tr>
                                    <tr>
                                    <th>profession</th>
                                        <td>{{ patient.profession}}</td>
                                        
                                    </tr>
                                    <tr>
                                    <th>sexe</th>
                                        <td>{{ patient.sexe}}</td>
                                        
                                    </tr>
                                    <tr>
                                    <th>age</th>
                                        <td>{{ patient.age}}</td>
                                        
                                    </tr>
                                    <tr>
                                    <th>adresse</th>
                                        <td>{{ patient.adresse}}</td>
                                        
                                    </tr>
                                    <tr>
                                    <th>cin</th>
                                        <td>{{ patient.cin}}</td>
                                        
                                    </tr>
                                    <tr>
                                    <th>date naissance</th>
                                        <td>{{ patient.date_naissance}}</td>
                                        
                                    </tr>
                                    <tr>
                                    <th>lieu naisance</th>
                                        <td>{{ patient.lieu_naisance}}</td>
                                        
                                    </tr>
                                    <tr>
                                    <th>num securite sociale</th>
                                        <td>{{ patient.num_securite_sociale}}</td>
                                        
                                    </tr>
                                </tbody>
                            </table>

                            <h4 class="mt-5">Tumeur Detailles</h4>
                            <div  v-for="tumeur in patient.tumeurs" :key="tumeur.id">
                                <div class="alert alert-primary" role="alert">
                                    Tumeur Num: {{tumeur.id}}
                                </div>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                        <th>nom_tumeur</th>
                                            <td>{{ tumeur.nom_tumeur }}</td> 
                                        </tr>
                                        <tr>
                                        <th scope="col">diagnostic_de_base</th>
                                            <td>{{ tumeur.diagnostic_de_base}}</td>
                                            
                                        </tr>
                                        <tr>
                                        <th scope="col">topographie</th>
                                            <td>{{ tumeur.topographie}}</td>
                                        
                                        </tr>
                                        <tr>
                                        <th scope="col">morphologie</th>
                                        <td>{{ tumeur.morphologie}}</td>
                                            
                                        </tr>
                                        <tr>
                                        <th scope="col">comportement_tumoral</th>
                                            <td>{{ tumeur.comportement_tumoral}}</td>
                                            
                                        </tr>
                                        <tr>
                                        <th scope="col">differenciation_histologique</th>
                                            <td>{{ tumeur.differenciation_histologique}}</td>
                                            
                                        </tr>
                                        <tr>
                                        <th scope="col">classification_TNM</th>
                                            <td>{{ tumeur.classification_TNM}}</td>
                                            
                                        </tr>
                                        <tr>
                                        <th scope="col">extension</th>
                                            <td>{{ tumeur.extension}}</td>
                                            
                                        </tr>
                                        <tr>
                                        <th scope="col">siege_metastase</th>
                                            <td>{{ tumeur.siege_metastase}}</td>
                                            
                                        </tr>
                                        <tr>
                                        <th scope="col">date_incidence</th>
                                            <td>{{ tumeur.date_incidence}}</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>




                            <h4 class="mt-5">Hopital Detailles</h4>
                            <div  v-for="hopital in patient.hopitals" :key="hopital.id">
                                <div class="alert alert-primary" role="alert">
                                    Nom Hopital: {{hopital.hopital}}
                                </div>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                        <th>Nom Hopital</th>
                                            <td>{{ hopital.hopital }}</td> 
                                        </tr>
                                        <tr>
                                        <th scope="col">Numero Laboratoire</th>
                                            <td>{{ hopital.num_laboratoire}}</td>
                                            
                                        </tr>
                                        <tr>
                                        <th scope="col">Numero Cas</th>
                                            <td>{{ hopital.num_cas}}</td>
                                        
                                        </tr>
                                        <tr>
                                        <th scope="col">unite</th>
                                        <td>{{ hopital.unite}}</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>



                            <h4 class="mt-5">Suivie Detailles</h4>
                            <div  v-for="suivie in patient.suivres" :key="suivie.id">
                                <div class="alert alert-primary" role="alert">
                                    Numero Suivie: {{suivie.id}}
                                </div>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                        <th>Date derniere contact</th>
                                            <td>{{ suivie.date_derniere_contact }}</td> 
                                        </tr>
                                        <tr>
                                        <th scope="col">Statut</th>
                                            <td>{{ suivie.statut}}</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                             

                        </div>
                                
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ModalComponent',
    props: ['patient'],
        
}
</script>