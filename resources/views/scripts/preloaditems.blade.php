@include('scripts.notifications')
<script type="text/javascript">
  $(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('#datepicker').datepicker();
    $('#printButton').click(function(event) {
      /* Act on the event */
      var mode = 'iframe'; //popup
      var close = mode == "popup";
      var options = { mode : mode, popClose : close };
      $('#printDiv').printArea(options);
    });
    $('#datepicker').datepicker();
    $('#datatable').DataTable({
      dom: 'Bfrtip',
      buttons: [
      'copyHtml5',
      'excelHtml5',
      'csvHtml5',
      'pdfHtml5',
      'print'
      ]
    });
    $('#sidebarCollapse').on('click', function () {
     $('.sidebar,#page-wrapper,#page-footer,.lx,.mx').toggleClass('active');
   });
    window.onresize = function() {
      if($(window).width() <= 768) {
        $('.sidebar,.mx').removeClass('active');
        $('.lx').css('display','block');
      }else {
        $('#page-wrapper').css('marginLeft',250)
        $('#page-footer').css('marginLeft',280)
        location.reload(true)
      }

    };
    jQuery(document).ready(function() {
      jQuery('.tabs .tab-links a').on('click', function(e)  {
      // var currentAttrValue = jQuery(this).attr('href');
      var addressValue = $(this).attr("href");
        // set cookie 
        setCookie('lastTab', addressValue, 100);
        // Show/Hide Tabs
        jQuery('.tabs ' + addressValue).show().siblings().hide();
      // Change/remove current tab to active
      jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
      e.preventDefault();
    });
      function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + "; " + expires;
      }
      function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i = 0; i <ca.length; i++) {
          var c = ca[i];
          while (c.charAt(0)==' ') {
            c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
          }
        }
        return "";
      }
      // Show/Hide Tabs
      jQuery('.tabs ' + getCookie('lastTab')).show().siblings().hide();
      // Change/remove current tab to active
      jQuery('.tabs .tab-links a[href="'+getCookie('lastTab')+'"').parent('li').addClass('active').siblings().removeClass('active');
    });
  });
</script>