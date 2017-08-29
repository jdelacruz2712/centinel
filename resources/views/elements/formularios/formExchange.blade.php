<div class="modal-content">
    <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 id="myLargeModalLabel3" class="modal-title">Cambiar Tipo de Cambio</h4>
    </div>
    <div class="modal-body">
        <form id="formExchange" @submit.prevent="onSubmit" class="sky-form" @keydown="form.errors.clear($event.target.name)">
            <fieldset>
                <section>
                    <label class="input">
                        <i class="icon-append fa fa-money"></i>
                        <input type="text" name="numExchange" v-model="form.numExchange" placeholder="3.1" onkeypress="return filterNumber(event)" onkeydown="return BlockCopyPaste(event)">
                        <b class="tooltip tooltip-bottom-right">Ingrese el tipo de cambio que desees utilizar</b>
                    </label>
                    <p class="text-danger" v-if="form.errors.has('numExchange')" v-text="form.errors.get('numExchange')"></p>
                </section>
            </fieldset>
            <div class="modal-footer">
                <button type="submit" class="btn-u btnExchange"><i class="fa fa-save"></i> Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>
<script src="{!! asset('js/FormExchange.js?version='.date('YmdHis'))!!}"></script>
<script>
    formEnter('formExchange',true)
</script>