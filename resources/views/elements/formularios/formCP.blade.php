<div class="modal-content">
    <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 id="myLargeModalLabel3" class="modal-title">Crear Nuevo CP</h4>
    </div>
    <div class="modal-body">
        <form id="formCP" @submit.prevent="onSubmit" class="sky-form" @keydown="form.errors.clear($event.target.name)">
            <fieldset>
                <div class="col-md-7">
                    <section>
                        <label class="input">
                            <i class="icon-append fa fa-product-hunt"></i>
                            <input type="text" name="numCP" v-model="form.numCP" placeholder="843200" onkeypress="return filterNumber(event)" onkeydown="return BlockCopyPaste(event)">
                            <b class="tooltip tooltip-bottom-right">Ingresa el número de la CP</b>
                        </label>
                        <p class="text-danger" v-if="form.errors.has('numCP')" v-text="form.errors.get('numCP')"></p>
                    </section>
                </div>
                <div class="col-md-5">
                    <span class="label label-purple rounded-2x text-white text-center"><i class="fa fa-exclamation-triangle"></i> Llenar Correctamente</span>
                </div>
                <div class="col-md-6">
                    <section>
                        <label class="label text-bold">Fecha de Inicio</label>
                        <label class="input">
                            <i class="icon-append fa fa-calendar"></i>
                            <input class="dateBegin" type="text" name="dateBegin" v-model="form.dateBegin" onkeypress="return false" onkeydown="return BlockCopyPaste(event)">
                            <b class="tooltip tooltip-bottom-right">Ingrese la fecha en la cual ingreso</b>
                        </label>
                        <p class="text-danger" v-if="form.errors.has('dateBegin')" v-text="form.errors.get('dateBegin')"></p>
                    </section>
                </div>
                <div class="col-md-6">
                    <section>
                        <label class="label text-bold">Fecha de Fin</label>
                        <label class="input">
                            <i class="icon-append fa fa-calendar-check-o"></i>
                            <input class="dateFinish" type="text" name="dateFinish" v-model="form.dateFinish" onkeypress="return false" onkeydown="return BlockCopyPaste(event)">
                            <b class="tooltip tooltip-bottom-right">Ingrese la fecha en la que culmino sus estudios</b>
                        </label>
                        <p class="text-danger" v-if="form.errors.has('dateFinish')" v-text="form.errors.get('dateFinish')"></p>
                    </section>
                </div>
            </fieldset>
            <div class="modal-footer">
                <button type="submit" class="btn-u btnCP"><i class="fa fa-save"></i> Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>
<script src="{!! asset('js/FormCP.js?version='.date('YmdHis'))!!}"></script>
<script>
    formEnter('formExchange',true)
</script>