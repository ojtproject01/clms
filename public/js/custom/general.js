
topbar.show();
function number_format(number, decimals, dec_point, thousands_sep) {
  // Strip all characters but numerical ones.
  number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function (n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

function getPercentage(partialValue, totalValue) {
  return (partialValue / 100) * totalValue;
}

//---------------- POPOVER --------------------//
var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})

//------------ LOGOUT BUTTON-------------//
$("#logoutbttn").click(function () {
  Swal.fire({
    title: 'Confirmation',
    text: "Are you sure you want to sign out?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.replace("logout.php");
    }
  });
})

// Spinner
var spinner = function () {
  setTimeout(function () {
    if ($('#spinner').length > 0) {
      $('#spinner').removeClass('show');
    }
  }, 1);
};
spinner();


// Back to top button
$(window).scroll(function () {
  if ($(this).scrollTop() > 300) {
    $('.back-to-top').removeClass('hidden').addClass('visible');
  } else {
    $('.back-to-top').removeClass('visible').addClass('hidden');
  }
});
$('.back-to-top').click(function () {
  $('html, body').animate({ scrollTop: 0 },  0, 'swing');
  return false;
});


// Sidebar Toggler
$('.sidebar-toggler').click(function () {
  $('.sidebar, .content').toggleClass("open");
  return false;
});

// $('[data-bs-dismiss=modal]').on('click', function (e) {
//   var $t = $(this),
//       target = $t[0].href || $t.data("target") || $t.parents('.modal') || [];

// $(target)
//   .find("input,textarea,select")
//      .val('')
//      .end()
//   .find("input[type=checkbox], input[type=radio]")
//      .prop("checked", "")
//      .end();
// })


function customFadeIn( elem, ms )
{
  if( ! elem )
    return;

  elem.style.opacity = 0;
  elem.style.filter = "alpha(opacity=0)";
  elem.style.display = "inline-block";
  elem.style.visibility = "visible";

  if( ms )
  {
    var opacity = 0;
    var timer = setInterval( function() {
      opacity += 50 / ms;
      if( opacity >= 1 )
      {
        clearInterval(timer);
        opacity = 1;
      }
      elem.style.opacity = opacity;
      elem.style.filter = "alpha(opacity=" + opacity * 100 + ")";
    }, 50 );
  }
  else
  {
    elem.style.opacity = 1;
    elem.style.filter = "alpha(opacity=1)";
  }
}

function customFadeOut( elem, ms )
{
  if( ! elem )
    return;

  if( ms )
  {
    var opacity = 1;
    var timer = setInterval( function() {
      opacity -= 50 / ms;
      if( opacity <= 0 )
      {
        clearInterval(timer);
        opacity = 0;
        elem.style.display = "none";
        elem.style.visibility = "hidden";
      }
      elem.style.opacity = opacity;
      elem.style.filter = "alpha(opacity=" + opacity * 100 + ")";
    }, 50 );
  }
  else
  {
    elem.style.opacity = 0;
    elem.style.filter = "alpha(opacity=0)";
    elem.style.display = "none";
    elem.style.visibility = "hidden";
  }
}
