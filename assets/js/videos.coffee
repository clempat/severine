$(document).ready ->
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



