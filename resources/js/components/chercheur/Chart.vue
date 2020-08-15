<template>
    <div>
        <form action="" class="container-fluid">
            <div class="row">

                <div class="form-group col">
                     <label for="hum">De</label>
                     <input type="number" min="1900" max="2099" step="1" class="form-control" v-model="beginDate"/>
                   
                </div>
                <div class="form-group col">
                    <label for="pot">Jusqu'a </label>
                     <input type="number" min="1900" max="2099" step="1" class="form-control" v-model="endDate"/>
                    
                </div>
                <div class="form-group col">
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
                <div class="col">   
                    <a class="btn btn-block btn-primary" @click="getFullData">
                        Chercher
                    </a>
                </div>
            </div>


            <!-- line Chart -->
            <div class="row" >
                <div class="col s4">
                    <line-chart
                        :chartData="dataCollectionPercentage"
                        
                    ></line-chart>

                </div>
                <div class="col s4">
                    <horizontal-bar
                        :chartData="dataCollectionAge"
                    ></horizontal-bar>

                </div>
                <div class="col s4">
                    <pie-chart
                        :chartData="dataCollectionGender"
                    ></pie-chart>


                </div>
            </div>
        </form>
    </div>
</template>

<script>
import LineChart from './chartjsLine'
import PieChart from './chartjsPie'
import HorizontalBar from './chartjsRadar'

export default { 
    data(){
        return {
            beginDate:2020,
            endDate: 2020,
            state: null,
            dataCollectionPercentage: null,
            dataCollectionAge: null,
            dataCollectionGender: null,
            interval: null,
            loaded: false,
            timeLine: [2000,2010,3,4,5,6,7,8],
            dataAgeAdult: [5,3,5,4,5,6,7,8],
            dataAgeAdoliscent: [8,7,6,5,4,3,2,1],
            dataPercentage: [8,7,6,5,4,3,2,1],
            dataMale: [8,7,6,5,4,3,2,1],
            dataFemale: [8,7,6,5,4,3,2,1],
            dataAgeChild: [8,7,6,5,4,3,2,1]
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
                        backgroundColor: '#ed553bb8',
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
        }
    },
    mounted(){
        this.fillData()
       
    },
    components: {
        LineChart,
        PieChart,
        HorizontalBar
    }
    
}
</script>

<style scoped>

</style>