			<script type="text/javascript">
				loadScript(plugin_path + "datatables/js/jquery.dataTables.min.js", function(){
					loadScript(plugin_path + "datatables/dataTables.bootstrap.js", function(){

						if (jQuery().dataTable) {

							var table = jQuery('#datatable_sample');
							table.dataTable({
								"order": [],
								"lengthMenu": [
									[5, 10, 15, -1],
									[5, 10, 15, "All"] // change per page values here
								],
								// set the initial value
								"pageLength": 5,            
								"pagingType": "bootstrap_full_number",
								"language": {
									"lengthMenu": "  _MENU_ Nombre d'éléments",
									"paginate": {
										"previous":"Précédent",
										"next": "Suivant",
										"last": "Dernier",
										"first": "Premier"
									}
								},
								"columnDefs": [{  // set default column settings
									'targets': 'nosort',
									'orderable': false
								}, {
									"searchable": false,
									"targets": [0]
								}],
							});

							var tableWrapper = jQuery('#datatable_sample_wrapper');

							table.find('.group-checkable').change(function () {
								var set = jQuery(this).attr("data-set");
								var checked = jQuery(this).is(":checked");
								jQuery(set).each(function () {
									if (checked) {
										jQuery(this).attr("checked", true);
										jQuery(this).parents('tr').addClass("active");
									} else {
										jQuery(this).attr("checked", false);
										jQuery(this).parents('tr').removeClass("active");
									}
								});
								jQuery.uniform.update(set);
							});

							table.on('change', 'tbody tr .checkboxes', function () {
								jQuery(this).parents('tr').toggleClass("active");
							});

							tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown

						}

					});
				});
			</script>

			<script type="text/javascript">
			/**	loadScript(plugin_path + "datatables/js/jquery.dataTables.min.js", function(){
					loadScript(plugin_path + "datatables/dataTables.bootstrap.js", function(){

						if (jQuery().dataTable) {

							$(document).ready(function() {
							    $('#datatable_sample').DataTable();
							} );

						$('#datatable_sample').dataTable( {
						  "columnDefs": [
						    { "orderable": false, "targets": 0 }
						  ]
						} );



						}
					});
				});
			</script>