$(function() {

	$(document).ready(function(){
		$("select").attr("class", "form-control");
    });	

	$("#btn_add_donor").click(function(){
		clearErrors();
		$("#form_donor")[0].reset();
		$("#modal_donor").modal();
	});

	$("#form_donor").submit(function() {

		$.ajax({
			type: "POST",
			url: BASE_URL + "home/ajax_save_donor",
			dataType: "json",
			data: $(this).serialize(),
			beforeSend: function() {
                clearErrors();
                $("#btn_save_donor").siblings(".help-block").html(loadingImg("Verificando..."));
			},
			success: function(response) {
				clearErrors();
				if (response["status"]) {
					$("#modal_donor").modal("hide");
					swal("Sucesso!","Usuário salvo com sucesso!", "success");
					dt_donor.ajax.reload();
				} else {
					showErrorsModal(response["error_list"])
				}
            }
		})

		return false;
	});

	$("#btn_your_donor").click(function() {

		$.ajax({
			type: "POST",
			url: BASE_URL + "home/ajax_get_donor_data",
			dataType: "json",
			data: {"donor_id": $(this).attr("donor_id")},
			success: function(response) {
				clearErrors();
				$("#form_donor")[0].reset();
				$.each(response["input"], function(id, value) {
					$("#"+id).val(value);
				});
				$("#modal_donor").modal();
			}
		})

		return false;
	});

	function active_btn_user() {
		
		$(".btn-edit-donor").click(function(){
			$.ajax({
				type: "POST",
				url: BASE_URL + "home/ajax_get_donor_data",
				dataType: "json",
				data: {"donor_id": $(this).attr("donor_id")},
				success: function(response) {
					clearErrors();
					$("#form_donor")[0].reset();
					$.each(response["input"], function(id, value) {
						$("#"+id).val(value);
					});
					$("#modal_donor").modal();
				}
			})
		});

		$(".btn-del-donor").click(function(){
			
			donor_id = $(this);
			swal({
				title: "Atenção!",
				text: "Deseja deletar esse usuário?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#d9534f",
				confirmButtonText: "Sim",
				cancelButtontext: "Não",
				closeOnConfirm: true,
				closeOnCancel: true,
			}).then((result) => {
				if (result.value) {
					$.ajax({
						type: "POST",
						url: BASE_URL + "home/ajax_delete_donor_data",
						dataType: "json",
						data: {"donor_id": donor_id.attr("donor_id")},
						success: function(response) {
							swal("Sucesso!", "Ação executada com sucesso", "success");
							dt_donor.ajax.reload();
						}
					})
				}
			})

		});
	}

	var dt_donor = $("#dt_donors").DataTable({
		"oLanguage": DATATABLE_PTBR,
		"autoWidth": false,
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url": BASE_URL + "home/ajax_list_donor",
			"type": "POST",
		},
		"columnDefs": [
			{ targets: "no-sort", orderable: false },
			{ targets: "dt-center", className: "dt-center" },
		],
		"drawCallback": function() {
			active_btn_user();
		}
	});

})