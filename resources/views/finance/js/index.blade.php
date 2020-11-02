<!-- helpers -->
<script src="{{ asset('js/moment.js') }}"></script>

<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.11/js/dataTables.bootstrap.min.js"></script>

<!-- datatables responsive extension -->
<script src="//cdn.datatables.net/responsive/2.0.2/js/dataTables.responsive.min.js"></script>

<!-- buttons for datatables -->
<script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
<script src="//cdn.datatables.net/buttons/1.1.2/js/buttons.flash.min.js"></script>
<script src="{{ asset('js/jszip.min.js') }}"></script>
<script src="{{ asset('js/pdfmake.min.js') }}"></script>
<script src="{{ asset('js/vfs_fonts.js') }}"></script>
<script src="{{ asset('js/buttons.html5.min.js') }}"></script>

<!-- morris chart -->
<script src="{{ asset('js/raphael.min.js') }}"></script>
<script src="{{ asset('js/morris.min.js') }}"></script>

<script type="text/javascript">
function diffHuman(time){
  return moment.duration(moment(time).diff()).humanize(true);
}

function updateLatestTransactionTime(){
  var $row = $('a#latest-transaction'),
      msg  = 'This is your latest transaction, about ' + diffHuman($row.data('created-at'));

  $row.tooltip('hide')
      .attr('data-original-title', msg)
      .tooltip('fixTitle')
      .tooltip('show');
}

function setCurrentBalance(bal){
  $('#current-balance').css('color', bal < 0 ? 'red' : 'black');    
  $('#current-balance').text( bal/100 );
}

// chart account summary
var chartAccountSummary = Morris.Bar({
  element: 'chart-account-summary',
  data: [
    {month:'No data', debit:0, credit:0, balance:0}
  ],
  xkey: 'month',
  ykeys: ['debit', 'credit', 'balance'],
  labels: ['Debit', 'Credit', 'Balance'],
  hideHover:'auto',
});

// chart transaction history
var chartTransactionHistory = Morris.Line({
  element: 'chart-transaction-history',
  data: [
    {date:'No data', debit:0, credit:0, balance:0}
  ],
  xkey: 'date',
  ykeys: ['debit', 'credit', 'balance'],
  labels: ['Debit', 'Credit', 'Balance'],
  hideHover:'auto',
});

// form handler
$('form[data-ajax="true"] [type="submit"]').click(function(e){
  e.preventDefault();

  var $form = $(this).closest('form');

  $.ajax({
    method:$form.attr('method'),
    url:$form.attr('action'),
    data:$form.serialize(),
    success:function(data){
      if(data.error){
        alert(data.msg);
        return;
      }
      $form.find('[name="amount"], [name="desc"]').each(function(key){
        $(this).val('');
      });

      reloadLedgerData();
    },
    error:function(data){
      console.log('failed to submit ajax form');
    }
  });

});
updateLatestTransactionTime();
setInterval(60000, updateLatestTransactionTime);
</script>