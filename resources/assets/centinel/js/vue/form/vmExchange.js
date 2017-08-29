/**
 * Created by jdelacruz on 24/08/2017.
 */
var vmFormExchange = new Vue({
    el: '#formExchange',
    data: {
        form: new Form({
            numExchange: ''
        })
    },
    mounted(){
      this.loadFormExchange()
    },
    methods: {
        onSubmit() {
            $('.btnExchange').html('<i class="fa fa-spin fa-spinner"></i> Cargando')
            this.form.post('/user/saveExchange')
                .then(response => {
                    $('.btnExchange').html('<i class="fa fa-save"></i> Guardar Cambios')
                    alertaSimple('','Tú Tipo de Cambio de Guardo Exitosamente','success')
                })
                .catch(error => {
                    $('.btnExchange').html('<i class="fa fa-save"></i> Guardar Cambios')
                    alertaSimple('','No completaste los campos correctamente o</br>Ha ocurrido un problema<br>Comunicarse con los especialistas','error','4000')
                })
        },
        loadFormExchange() {
            axios.get('/user/getExchange')
                .then(response => {
                        this.form.numExchange = response.data[0].num_exchange
                })
                .catch(error => console.log(error))
        }
    }
})