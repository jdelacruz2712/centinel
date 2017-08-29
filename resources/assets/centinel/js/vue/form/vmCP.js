/**
 * Created by jdelacruz on 24/08/2017.
 */
var vmFormCP = new Vue({
    el: '#formCP',
    data: {
        form: new Form({
            numCP: '',
            userID: '',
            dateBegin: '',
            dateFinish: ''
        })
    },
    methods: {
        onSubmit() {
            $('.btnCP').html('<i class="fa fa-spin fa-spinner"></i> Cargando')
            this.form.post('/user/saveCP')
                .then(response => {
                    $('.btnCP').html('<i class="fa fa-save"></i> Guardar Cambios')
                    alertaSimple('',`Se guardo la CP ${this.form.numCP} Correctamente`,'success', 3000)
                })
                .catch(error => {
                    $('.btnCP').html('<i class="fa fa-save"></i> Guardar Cambios')
                    alertaSimple('','No completaste los campos correctamente o</br>Ha ocurrido un problema<br>Comunicarse con los especialistas','error','4000')
                })
        },
        loadFormExchange() {
            axios.get('/user/getCP', {
                    params: {
                        userID: this.form.userID,
                        numCP: this.form.numCP
                    }
                })
                .then(response => {
                    this.form.numCP = response.data[0].number_order
                    this.form.dateBegin = response.data[0].date_begin
                    this.form.dateFinish = response.data[0].date_finish
                })
                .catch(error => console.log(error))
        }
    }
})

singleDate('dateBegin')
$('.dateBegin').on('apply.daterangepicker', function (ev, picker) {
    vmFormCP.form.dateBegin = picker.startDate.format('YYYY-MM-DD')
})

singleDate('dateFinish')
$('.dateFinish').on('apply.daterangepicker', function (ev, picker) {
    vmFormCP.form.dateFinish = picker.startDate.format('YYYY-MM-DD')
})