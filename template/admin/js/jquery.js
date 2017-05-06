function UserSearch() {
  var user = $('div.s-u');
  var search = $('input#search').val();
  var form = $('form#seach-users');
  if (search !== "") {
    user.hide(0);
    user.each(function() {
      var username = $(this).find('.key').html().toLowerCase();
      if (username == search) {
        $(this).show(0);
      }
    })
  } else {
    user.show(0);
  }
}
function InputDesc() {
  var input = $('input.search');
  input.on('focus', function() {
    $('p.input-desc').stop().slideDown(400);
  });
  input.on('blur', function() {
    if (input.val() == '') {
      $('p.input-desc').stop().slideUp(400);
    }
  });
}
function PageDropdown() {
  var drop = $('div.dropdown');
  var btn = $('img.dropbtn');
  btn.on('click', function() {
    drop.fadeOut(0);
    $(this).closest('.single-wrapper').find('.dropdown').fadeIn(0);
  });
  $(window).click(function() {
    $('.dropdown').fadeOut(0);
  });
  $('.dropdown , .dropbtn').click(function(event){
    event.stopPropagation();
  });
}

function ShowHintInstall() {
  var hint = $('div.hint-text');
  var btn = $('p#hint-help');
  btn.on('click', function() {
    hint.stop().css({
      'margin-top' : '0',
      'opacity' : '1'
    });
  });
}

function FadeInOnLoad() {
  var item = $('.hideme');
  item.delay(300).css('opacity', '1');
}

$(document).ready(function() {
  UserSearch();
  PageDropdown();
  InputDesc();
  FadeInOnLoad();
  ShowHintInstall();
  setInterval(UserSearch, 1000);
})