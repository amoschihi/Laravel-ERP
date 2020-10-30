<script type="text/javascript">
	showClassInfo();
	$('#academic').on('change',function() {
		showClassInfo()
	})
	$('#cor').on('change',function() {
		showClassInfo()
	})
	$('#lvl').on('change',function() {
		showClassInfo()
	})
	$('#atype').on('change',function() {
		showClassInfo()
	})
	$('#show-class-info').on('click',function(e) {
		e.preventDefault();
		showClassInfo();
		$('#choose-academic').modal('show')
		$('#myModal').modal('hide')
	})
	function showClassInfo()
	{
		var data = $('#frm-view-class').serialize();

		$.get('{{ route('showClassInformation') }}',data,function(data) {
			$('#add-class-info').empty().append(data);
			$('td#hidden').addClass('hidden');
			MergeCommonRows($('#table-class-info'));
			//SummerizeTable($('#table-class-info'));
		});
	}
	function MergeCommonRows(table) 
	{
		var firstColumnBreaks = [];
		$.each(table.find('th'),function(i) {
			var previous = null, cellToExtend = null, rowspan = 1;
			table.find("td:nth-child(" + i + ")").each(function(index, e) {
				var jthis = $(this), content = jthis.text();
				if(previous == content && content !== "" && $.inArray(index, firstColumnBreaks) === -1) {
					jthis.addClass('hidden');
					cellToExtend.attr("rowspan", (rowspan = rowspan + 1));
				}else {
					if(i === 1) firstColumnBreaks.push(index);
					rowspan = 1;
					previous = content;
					cellToExtend = jthis;
				}
			});
		});
		$('td.hidden').remove();
	}
</script>