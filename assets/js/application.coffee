#=require jquery-1.9.1.min.js
#=require jquery.dotdotdot-1.5.6-packed.js
#=require bootstrap.min.js

$(document).ready ->
  $('#header_photo').carousel()
  $('#filter a').click (e) ->
    $.get($(this).attr('href'), (data) ->
      $('.thumbnails').quicksand($(data).find('#thumbnail_container li'))
    )
    e.preventDefault()
    $('#filter').find('li').removeClass('active')
    $(this).parent('li').addClass('active')










