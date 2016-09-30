
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<?php if ($this->session->flashdata('success')):?>
		<p class="alert alert-success"> <?= $this->session->flashdata('success');?></p>
	<?php endif ?>
	<?php if ($this->session->flashdata('danger')):?>
		<p class="alert alert-danger"> <?= $this->session->flashdata('danger');?></p>
	<?php endif ?>



	<h3>Listagem Impressões - Alunos</h3>
	<br />
	<br />
	<table id="table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Data</th>
				<th>Aluno</th>
				<th >Cópias</th>
				<th>Valor</th>
				<th>Total</th>
				<th>Situação</th>
				<th>Impressora</th>
				<th style="width:125px;">Ações</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
		<tfoot>
			<tr>
				<th>Data</th>
				<th>Aluno / Func.</th>
				<th >Cópias</th>
				<th>Valor</th>
				<th>Total</th>
				<th>Situação</th>
				<th>Impressora</th>
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
		"url": "<?php echo base_url('alunoImpressoes/ajax_list')?>",
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


	function reload_table()
	{
	table.ajax.reload(null,false); //reload datatable ajax 
}


function delete_person(idImpressaoAluno)
{
	if(confirm('Deseja realmente deletar esse registro?'))
	{
	// ajax delete data to database
	$.ajax({
		url : "<?php echo site_url('alunoImpressoes/ajax_delete')?>/"+idImpressaoAluno,
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





</div>

<!-- -->