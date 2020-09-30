
var link = location.href.split('?page')[0];
console.log(link);
$('.payment-links ul li a[href="' + link + '"]').parent().addClass('active');