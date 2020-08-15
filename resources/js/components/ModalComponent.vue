<template>
    <div>
        <div class="modal fade" id="AddUser" tabindex="-1" role="dialog" aria-labelledby="AddUserLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddUserLabel">Ajouter un enregistrement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="addPatient">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <h4 class="text-center bg-secondary my-3">Patient</h4>
                                    
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <textarea v-model="form.nom" type="text" name="nom" cols="50" rows="30"
                                            class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('nom') }"> </textarea>
                                        <has-error :form="form" field="nom"></has-error>
                                    </div>

                                    <div class="form-group">
                                        <label>Prénom</label>
                                        <input v-model="form.prenom" type="text" name="prenom"
                                            class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('prenom') }">
                                        <has-error :form="form" field="prenom"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label>Profession</label>
                                        <input v-model="form.profession" type="text" name="profession"
                                            class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('profession') }">
                                        <has-error :form="form" field="profession"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label>CIN</label>
                                        <input v-model="form.cin" type="number" name="cin"
                                            class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('cin') }">
                                        <has-error :form="form" field="cin"></has-error>
                                    </div>

                                    <div class="form-group">
                                        <label>Age</label>
                                        <input v-model="form.age" type="Number" name="age"
                                            class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('age') }">
                                        <has-error :form="form" field="age"></has-error>
                                    </div>

                                    <div class="form-group">
                                        <label>Date De Naissance</label>
                                        <input v-model="form.date_naissance" type="date" name="date_naissance"
                                            class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('date_naissance') }">
                                        <has-error :form="form" field="date_naissance"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label>Lieu De Naissance</label>
                                        <input v-model="form.lieu_naisance" type="text" name="lieu_naisance"
                                            class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('lieu_naisance') }">
                                        <has-error :form="form" field="lieu_naisance"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label>Sexe</label>
                                        <select v-model="form.sexe" class="form-control" name="sexe" id="sexe">
                                            <option value="homme">Homme</option>
                                            <option value="femme">Femme</option>
                                            <option value="autre">Autre</option>
                                        </select>
                                        <!-- <input v-model="form.email" type="text" name="email"
                                            class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('email') }">
                                        <has-error :form="form" field="email"></has-error> -->
                                    </div>

                                    <div class="form-group"> 
                                        <label>Governerat</label>
                                        <select v-model="form.adresse" name="adresse" class="form-control" id="adresse">
                                            <option value="Ariana" selected="">Ariana</option>
                                            <option value="Béja">Béja</option>
                                            <option value="Ben Arous">Ben Arous</option>
                                            <option value="Bizerte">Bizerte</option>
                                            <option value="El Kef">El Kef</option>
                                            <option value="Gabes">Gabes</option>
                                            <option value="Gafsa">Gafsa</option>
                                            <option value="Jandouba">Jandouba</option>
                                            <option value="Kasserine">Kasserine</option>
                                            <option value="Kairouan">Kairouan</option>
                                            <option value="Kebili">Kebili</option>
                                            <option value="Mahdia">Mahdia</option>
                                            <option value="Monastir">Monastir</option>
                                            <option value="Manouba">Manouba</option>
                                            <option value="Medenine">Medenine</option>
                                            <option value="Nabeul">Nabeul</option>
                                            <option value="Sfax">Sfax</option>
                                            <option value="Sidi Bouzid">Sidi Bouzid</option>
                                            <option value="Siliana">Siliana</option>
                                            <option value="Sousse">Sousse</option>
                                            <option value="Tataouine">Tataouine</option>
                                            <option value="Tozeur">Tozeur</option>
                                            <option value="Tunis">Tunis</option>
                                            <option value="Zaghouan">Zaghouan</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Numero Securite Sociale</label>
                                        <input v-model="form.num_securite_sociale" type="text" name="num_securite_sociale"
                                            class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('num_securite_sociale') }">
                                        <has-error :form="form" field="num_securite_sociale"></has-error>
                                    </div>
                                </div>




                                <div class="col-6">
                                    <h4 class="text-center bg-secondary my-3">Tumeur</h4>
                                    
                                    <div class="form-group">
                                        <label>Nom Tumeur</label>
                                        <input v-model="form.nom_tumeur" type="text" name="nom_tumeur"
                                            class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('nom_tumeur') }">
                                        <has-error :form="form" field="nom_tumeur"></has-error>
                                    </div>

                                    <div class="form-group">
                                        <label>Diagnostic de Base</label>
                                        <input v-model="form.diagnostic_de_base" type="text" name="diagnostic_de_base"
                                            class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('diagnostic_de_base') }">
                                        <has-error :form="form" field="diagnostic_de_base"></has-error>
                                    </div>

                                    <div class="form-group">
                                        <label>Topographie</label>
                                        <input v-model="form.topographie" type="text" name="topographie"
                                            class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('topographie') }">
                                        <has-error :form="form" field="topographie"></has-error>
                                    </div>

                                    <div class="form-group">
                                        <label>Morphologie</label>
                                        <input v-model="form.morphologie" type="text" name="morphologie"
                                            class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('morphologie') }">
                                        <has-error :form="form" field="morphologie"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label>Comportement Tumoral</label>
                                        <input v-model="form.comportement_tumoral" type="text" name="comportement_tumoral"
                                            class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('comportement_tumoral') }">
                                        <has-error :form="form" field="comportement_tumoral"></has-error>
                                    </div>

                                    <div class="form-group">
                                        <label>Differenciation Histologique</label>
                                        <input v-model="form.differenciation_histologique" type="text" name="differenciation_histologique"
                                            class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('differenciation_histologique') }">
                                        <has-error :form="form" field="differenciation_histologique"></has-error>
                                    </div>

                                    <div class="form-group">
                                        <label>Classification TNM</label>
                                        <input v-model="form.classification_TNM" type="text" name="classification_TNM"
                                            class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('classification_TNM') }">
                                        <has-error :form="form" field="classification_TNM"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label>Extension</label>
                                        <input v-model="form.extension" type="text" name="extension"
                                            class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('extension') }">
                                        <has-error :form="form" field="extension"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label>Siege Metastase</label>
                                        <input v-model="form.siege_metastase" type="text" name="siege_metastase"
                                            class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('siege_metastase') }">
                                        <has-error :form="form" field="siege_metastase"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label>Date Incidence</label>
                                        <input v-model="form.date_incidence" type="date" name="date_incidence"
                                            class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('date_incidence') }">
                                        <has-error :form="form" field="date_incidence"></has-error>
                                    </div>



                                </div>

                                <div class="col-6 mt-3">
                                     <h4 class="text-center bg-secondary my-3">Suivre</h4>
                                    
                                    <div class="form-group">
                                        <label>Date Derniere Contact</label>
                                        <input v-model="form.date_derniere_contact" type="date" name="date_derniere_contact"
                                            class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('date_derniere_contact') }">
                                        <has-error :form="form" field="date_derniere_contact"></has-error>
                                    </div>

                                    <div class="form-group">
                                        <label>Statut</label>
                                        <input v-model="form.statut" type="text" name="statut"
                                            class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('statut') }">
                                        <has-error :form="form" field="statut"></has-error>
                                    </div>

                                </div>

                                <div class="col-6 mt-3">

                                     <h4 class="text-center bg-secondary my-3">Hopital</h4>
                                    
                                    <div class="form-group">
                                        <label>Hopital</label>
                                        <input v-model="form.hopital" type="text" name="hopital"
                                            class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('hopital') }">
                                        <has-error :form="form" field="hopital"></has-error>
                                    </div>

                                    <div class="form-group">
                                        <label>Numéro Laboratoire</label>
                                        <input v-model="form.num_laboratoire" type="number" name="num_laboratoire"
                                            class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('num_laboratoire') }">
                                        <has-error :form="form" field="num_laboratoire"></has-error>
                                    </div>

                                    <div class="form-group">
                                        <label>Numéro Cas</label>
                                        <input v-model="form.num_cas" type="text" name="num_cas"
                                            class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('num_cas') }">
                                        <has-error :form="form" field="num_cas"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label>Unité</label>
                                        <input v-model="form.unite" type="text" name="unite"
                                            class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('unite') }">
                                        <has-error :form="form" field="unite"></has-error>
                                    </div>
                                </div>


                            </div>

                        </div>
                        <div class="modal-footer row">
                            <div class="alert alert-success col-md-6" role="alert" v-if="success">
                                {{success}}
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ModalComponent',
    props: ['form'],
    data(){
        return {
            success: null
        }
    },
    methods: {
        addPatient(){
            this.form.post('api/patient')
                .then(({ data }) => {
                    this.success = "Patient a ete ajouter avec succes"
                    this.$emit('event-add-patient')
                }).catch(({ data }) => {
                     this.success = "loperation a ete echouee s il vous plait essayer une autre fois"
                })
        }
    },
    created(){

    }
}
</script>