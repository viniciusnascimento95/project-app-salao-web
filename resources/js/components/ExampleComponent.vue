<template>
    <datetime type="datetime" v-model="dateTime13.valor" format="dd/MM/yyyy HH:mm" name="data_hora_agendamento" input-id="data_hora_agendamento"></datetime>
</template>

<script>
import { Datetime } from 'vue-datetime'
import 'vue-datetime/dist/vue-datetime.css'
    export default {
        props: [
            'dataAgendamento'
        ],
        data(){
            return{
                dateTime13: {
                    valor: '',
                },
            }
        },
        mounted() {
            this.dateTime13.valor = this.dataAgendamento
            console.log(this.dataAgendamento, this.datetime)
        },
    }
</script>
