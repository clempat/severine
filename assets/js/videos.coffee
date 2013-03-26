$(document).ready ->
  #Thumbnail height
  maxHeight = 0
  $('.thumbnail').each ->
    maxHeight = $(this).height()+200 if $(this).height()+200 > maxHeight

  $('.thumbnail').height(maxHeight)

  $('.sortable').sortable
    stop: (event, ui) ->
      i=0
      data={}
      $('.video').each ->
        data[i]= $(this).attr('id')
        i++
      $.post('videos/sort', {'sort':data})
  value = $('#photo_id').val()
  $('#'+value).addClass('ui-selected click-selected')
  $('.selectable').selectable
    filter: 'li'
    selected: (event, ui) ->
      if $(ui.selected).hasClass("click-selected")
        $(ui.selected).removeClass "ui-selected click-selected"
        $('#photo_id').val("")
      else
        $(ui.selected).addClass "click-selected"
        $('#photo_id').val($(ui.selected).attr('id'))

    unselected: (event, ui) ->
      $(ui.unselected).removeClass "click-selected"





