<div class="profile-edit">
    <div class="headline">
        <h3>Gestionar CP's</h3>
    </div>
    <div class="btn-group pull-right">
        <a class="btn btn-info" onclick="bodyModal('div.bodyCP','user/createCP')" data-toggle="modal" data-target=".modalCP"><i class="fa fa-plus"></i> Agregar Nuevo CP</a>
    </div>
    <div class="margin-bottom-15"></div>
    <table id="listOrders" class="table table-bordered" style="width: 100% !important;background-color: #ffffff;">
        <thead>
        <tr>
            <th>#</th>
            <th>Usuario</th>
            <th>N° CP</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        </thead>
    </table>
</div>
<script>
    dataTables('listOrders','{{ route('datatable.listorders') }}')
</script>