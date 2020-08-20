<template>
    <div>
        <div class="container-fluid">
            <div class="row">

                <div class="col-4">
                    <div class="tooltip-one">
                        <h3>statistique de toute la tunisie: </h3>
                        <p>ce diagramme contient toutes les statistiques de la tunisie trié par ville</p>
                        <p>chaque ville a sa propre couleur</p>
                    </div>
                </div>
                <div class="col-8">

                    <circle-chart
                        :chartData="dataCollectionAll"
                        :options="chartOptions"
                    ></circle-chart>
                </div>
            </div>
                
        </div>
        <hr class="my-5"/>
        <form action="">
            <div class="container mt-5">
                <div class="row">
                    <div class="form-group col-4">
                        <label for="hum">De</label>
                        <input type="number" min="1900" max="2099" step="1" class="form-control" v-model="beginDate"/>
                    
                    </div>
                    <div class="form-group col-4">
                        <label for="pot">Jusqu'a </label>
                        <input type="number" min="1900" max="2099" step="1" class="form-control" v-model="endDate"/>
                        
                    </div>
                    <div class="form-group col-4">
                        <label>Gouvernerat</label>
                        <select class="form-control">
                            <option value="" disabled selected>choisissez l'état</option>
                            <option value="Ariana" >Ariana</option>
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
                    <div class="col-8">

                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <input type="submit" class="btn btn-block btn-primary form-control" @click="getFullData" value="Chercher">      
                        </div> 
                    </div>
                </div>
            </div>
        </form>
        <!-- line Chart -->
        <div class="container-fuild" >
            <h2 class="my-5 text-center">
                ville: {Tunis}
            </h2>
            <div class="row">
                <div class="col-4  my-5">
                    <div class="tooltip-two">
                        <h3>statistique de {Tunis}: </h3>
                        <p>ce diagramme contient toutes les statistiques de {Tunis} trié par nombre personnes</p>
                    </div>
                </div>
                <div class="col-8  my-5">
                    <line-chart
                        :chartData="dataCollectionPercentage"
                        :options="chartOptions"
                        
                    ></line-chart>
                </div>


                <div class="col-8 my-5">
                    <horizontal-bar
                        :chartData="dataCollectionAge"
                        :options="chartOptions"
                    ></horizontal-bar>
                </div>
                <div class="col-4  my-5">
                    <div class="tooltip-three">
                        <h3>statistique {Tunis}: </h3>
                        <p>ce diagramme contient toutes les statistiques de {Tunis} trié par age</p>
                        <p>chaque age a sa propre couleur</p>
                    </div>
                </div>

                <div class="col-4 my-5">
                    <div class="tooltip-four">
                        <h3>statistique {Tunis}: </h3>
                        <p>ce diagramme contient toutes les statistiques de la tunisie trié par sexe</p>
                        <p>chaque sexe a sa propre couleur</p>
                    </div>
                </div>
                <div class="col-8  my-5">
                    <bar
                        :chartData="dataCollectionGender"
                        :options="chartOptions"
                    ></bar>
                </div>


            </div>
        </div>
    </div>
</template>

<script>
import LineChart from './chartjsLine'
import bar from './chartjsBar'
import HorizontalBar from './chartjsHorizontalBar'
import CircleChart from './chartjsCircle'

export default { 
    data(){
        return {
            chartOptions: {
                responsive: true,
                maintainAspectRatio: false
            },
            loaded: false,

            beginDate:2020,
            endDate: 2020,
            interval: null,

            state: null,
            
            dataCollectionPercentage: null,
            dataPercentage: [4,6,3,6,8,7,2,1],
            
            timeLine: [2010,2011,2012,2013,2014,2015,2016,2017],

            dataCollectionAge: null,
            dataAgeAdult: [5,3,5,4,5,6,7,8],
            dataAgeAdoliscent: [8,7,6,5,4,3,2,1],
            dataAgeChild: [8,7,6,5,4,3,2,1],
            
            dataCollectionGender: null,
            dataMale: [8,7,6,5,4,3,2,1],
            dataFemale: [8,7,6,5,4,3,2,1],

            dataCollectionAll: null,
            dataAllSates: [8,7,6,5,4,3],
            states: ['Tunis', 'Nabeul', 'sousse', 'bizerte', 'Tunis', 'Nabeul']
        }
    },
    methods: {
        getFullData(){
           
            console.log(this.beginDate);
            console.log(this.endDate);
            axios.get("api/get-percentage/" + this.beginDate + "/" + this.endDate).then( response => {
                console.log(response)
            })
        },
        fillData(){
            this.dataCollectionPercentage = {
                labels: this.timeLine,
                datasets: [
                    {
                        label: 'Tunis',
                        backgroundColor: 'rgba(153, 102, 255, 0.8)',
                        borderWidth: 1,
                        borderColor: '#f6d55c',
                        pointBackgroundColor: 'orange',
                        pointBorderColor: 'blue',
                        data: this.dataPercentage
                    }
                ]
            }
            this.dataCollectionAge = {
                labels: this.timeLine,
                datasets: [
                    {
                        label: 'entre 0-18',
                        backgroundColor: '#3ba3eda6',
                        borderWidth: 1,
                        borderColor: '#f6d55c',
                        pointBackgroundColor: 'orange',
                        pointBorderColor: 'blue',
                        data: this.dataAgeChild
                    },
                    {
                        label: 'entre 19-35',
                        backgroundColor: '#ed553bb8',
                        borderWidth: 1,
                        borderColor: '#f6d55c',
                        pointBackgroundColor: 'orange',
                        pointBorderColor: 'blue',
                        data: this.dataAgeAdoliscent
                    },
                    {
                        label: 'entre 36-80',
                        backgroundColor: '#26a69abf',
                        borderWidth: 1,
                        borderColor: '#f6d55c',
                        pointBackgroundColor: 'orange',
                        pointBorderColor: 'blue',
                        data: this.dataAgeAdult
                    }
                ]
            }
            this.dataCollectionGender = {
                labels: this.timeLine,
                datasets: [
                    {
                        label: 'femme',
                        backgroundColor: '#ed553bb8',
                        borderWidth: 1,
                        borderColor: '#f6d55c',
                        pointBackgroundColor: 'orange',
                        pointBorderColor: 'blue',
                        data: this.dataMale
                    },
                    {
                        label: 'homme',
                        backgroundColor: '#3ba3eda6',
                        borderWidth: 1,
                        borderColor: '#f6d55c',
                        pointBackgroundColor: 'orange',
                        pointBorderColor: 'blue',
                        data: this.dataFemale
                    },
                    
                ]
            }
            this.dataCollectionAll = {
                labels: this.states,
                datasets: [
                    {
                        label: 'femme',
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.8)',
                            'rgba(54, 162, 235, 0.8)',
                            'rgba(255, 206, 86, 0.8)',
                            'rgba(75, 192, 192, 0.8)',
                            'rgba(153, 102, 255, 0.8)',
                            'rgba(255, 159, 64, 0.8)'
                        ],
                        borderWidth: 1,
                        borderColor: '#f6d55c',
                        pointBackgroundColor: 'orange',
                        pointBorderColor: 'blue',
                        data: this.dataAllSates
                    }, 
                ]
            }
        }
    },
    mounted(){
        this.fillData()
       
    },
    components: {
        LineChart,
        bar,
        HorizontalBar,
        CircleChart
    }
    
}
</script>

<style scoped>
.tooltip-one{
    background-color: rgba(255, 99, 132, 0.8);
    padding: 10px 20px;
    width: 100%;
    height: auto;
    text-transform: capitalize;
    color: aliceblue;
}
.tooltip-two{
    background-color: rgba(54, 162, 235, 0.8);
    padding: 10px 20px;
    width: 100%;
    height: auto;
    text-transform: capitalize;
    color: aliceblue;
}
.tooltip-three{
    background-color: rgba(255, 206, 86, 0.8);
    padding: 10px 20px;
    width: 100%;
    height: auto;
    text-transform: capitalize;
    color: aliceblue;
}
.tooltip-four{
    background-color: rgba(153, 102, 255, 0.8);
    padding: 10px 20px;
    width: 100%;
    height: auto;
    text-transform: capitalize;
    color: aliceblue;
}
</style>