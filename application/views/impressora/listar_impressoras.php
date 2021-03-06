
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<?php if ($this->session->flashdata('success')):?>
		<p class="alert alert-success"> <?= $this->session->flashdata('success');?></p>
	<?php endif ?>
	<?php if ($this->session->flashdata('danger')):?>
		<p class="alert alert-danger"> <?= $this->session->flashdata('danger');?></p>
	<?php endif ?>



	<h3>Impressoras</h3>
	<br />
	<button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Nova Impressora</button>

	<br />
	<br />
	<table id="table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Marca</th>
				<th>Modelo</th>
				<th >Tinta</th>
				<th>Data de compra</th>
				<th style="width:125px;">Ações</th>
			</tr>
		</thead>
		<tbody>
		</tbody>

		<tfoot>
			<tr>
				<th>Marca</th>
				<th>Modelo</th>
				<th>Tinta</th>
				<th>Data de compra</th>
				<th>Ações</th>
			</tr>
		</tfoot>
	</table>



	<script type="text/javascript">

	var save_method; //for save method string
	var table;

	$(document).ready(function() {

	//datatables
	table = $('#table').DataTable({ 

	"processing": true, //Feature control the processing indicator.
	"serverSide": true, //Feature control DataTables' server-side processing mode.
	"order": [], //Initial no order.

	// Load data for the table's content from an Ajax source
	"ajax": {
		"url": "<?php echo base_url('impressora/ajax_list')?>",
		"type": "POST"
	},

//Set column definition initialisation properties.
"columnDefs": [
{ 
	"targets": [ -1 ], //last column
	"orderable": false, //set not orderable
},
],

});

//datepicker
$('.datepicker').datepicker({
	autoclose: true,
	format: "yyyy-mm-dd",
	todayHighlight: true,
	orientation: "top auto",
	todayBtn: true,
	todayHighlight: true,  
});

//set input/textarea/select event when change value, remove class error and remove text help block 
$("input").change(function(){
	$(this).parent().parent().removeClass('has-error');
	$(this).next().empty();
});
$("textarea").change(function(){
	$(this).parent().parent().removeClass('has-error');
	$(this).next().empty();
});
$("select").change(function(){
	$(this).parent().parent().removeClass('has-error');
	$(this).next().empty();
});

});



	function add_person()
	{
		save_method = 'add';
	$('#form')[0].reset(); // reset form on modals
	$('.form-group').removeClass('has-error'); // clear error class
	$('.help-block').empty(); // clear error string
	$('#modal_form').modal('show'); // show bootstrap modal
	$('.modal-title').text('Cadastrar Impressora'); // Set Title to Bootstrap modal title
}

function edit_person(id)
{
	save_method = 'update';
	$('#form')[0].reset(); // reset form on modals
	$('.form-group').removeClass('has-error'); // clear error class
	$('.help-block').empty(); // clear error string

	//Ajax Load data from ajax
	$.ajax({
		url : "<?php echo site_url('impressora/ajax_edit/')?>/" + id,
		type: "GET",
		dataType: "JSON",
		success: function(data)
		{

			$('[name="id"]').val(data.id);
			$('[name="marca"]').val(data.marca);
			$('[name="modelo"]').val(data.modelo);
			$('[name="tinta"]').val(data.tinta);
			$('[name="data_compra"]').datepicker('update',data.data_compra);
	$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
	$('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

},
error: function (jqXHR, textStatus, errorThrown)
{
	alert('Error get data from ajax');
}
});
}

function reload_table()
{
	table.ajax.reload(null,false); //reload datatable ajax 
}

function save()
{
	$('#btnSave').text('salvando...'); //change button text
	$('#btnSave').attr('disabled',true); //set button disable 
	var url;

	if(save_method == 'add') {
		url = "<?php echo site_url('impressora/ajax_add')?>";
	} else {
		url = "<?php echo site_url('impressora/ajax_update')?>";
	}

// ajax adding data to database
$.ajax({
	url : url,
	type: "POST",
	data: $('#form').serialize(),
	dataType: "JSON",
	success: function(data)
	{

	if(data.status) //if success close modal and reload ajax table
	{
		$('#modal_form').modal('hide');
		reload_table();
	}
	else
	{
		for (var i = 0; i < data.inputerror.length; i++) 
		{
	$('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
	$('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
}
}
$('#btnSave').text('save'); //change button text
$('#btnSave').attr('disabled',false); //set button enable 


},
error: function (jqXHR, textStatus, errorThrown)
{
	alert('Error adding / update data');
	$('#btnSave').text('save'); //change button text
	$('#btnSave').attr('disabled',false); //set button enable 

}
});
}

function delete_person(id)
{
	if(confirm('Deseja realmente apagar este registro?'))
	{
	// ajax delete data to database
	$.ajax({
		url : "<?php echo site_url('impressora/ajax_delete')?>/"+id,
		type: "POST",
		dataType: "JSON",
		success: function(data)
		{
	//if success reload ajax table
	$('#modal_form').modal('hide');
	reload_table();
},
error: function (jqXHR, textStatus, errorThrown)
{
	alert('Error deleting data');
}
});

}
}

</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title">Cadastrar</h3>
			</div>
			<div class="modal-body form">
				<form action="#" id="form" class="form-horizontal">
					<input type="hidden" value="" name="id"/> 
					<div class="form-body">
						<div class="form-group">
							<label class="control-label col-md-3">Marca</label>
							<div class="col-md-9">
								<input name="marca" placeholder="Marca" class="form-control" type="text">
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Modelo</label>
							<div class="col-md-9">
								<input name="modelo" placeholder="Modelo" class="form-control" type="text">
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Tinta</label>
							<div class="col-md-9">
								<select name="tinta" class="form-control">
									<option value="">--Tinta--</option>
									<option value="P/B">Preto e Branco</option>
									<option value="Colorido">Colorido</option>
								</select>
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Data de compra</label>
							<div class="col-md-9">
								<input name="data_compra" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
								<span class="help-block"></span>
							</div>

						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Inserir</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->





</div>

<!-- -->