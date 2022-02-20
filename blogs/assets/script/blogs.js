/* Footer */
$('footer .other-icons .erp').on('mouseover', function() {
  $(this).attr('src', '../assets/images/ERP-bg.png');
})
$('footer .other-icons .erp').on('mouseleave', function() {
  $(this).attr('src', '../assets/images/ERP.png');
})
$('footer .other-icons .dms').on('mouseover', function() {
  $(this).attr('src', '../assets/images/DMS-bg.png');
})
$('footer .other-icons .dms').on('mouseleave', function() {
  $(this).attr('src', '../assets/images/DMS.png');
})
$('footer .other-icons .crm').on('mouseover', function() {
  $(this).attr('src', '../assets/images/CRM-bg.png');
})
$('footer .other-icons .crm').on('mouseleave', function() {
  $(this).attr('src', '../assets/images/CRM.png');
})
$('footer .other-icons .pay').on('mouseover', function() {
  $(this).attr('src', '../assets/images/PAY-bg.png');
})
$('footer .other-icons .pay').on('mouseleave', function() {
  $(this).attr('src', '../assets/images/PAY.png');
})

$('#year').html(new Date().getFullYear());