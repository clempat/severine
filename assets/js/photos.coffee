$(document).ready ->
  new PhotoCropper()

class PhotoCropper
  constructor: ->
    $('#crop_box').Jcrop
      aspectRatio: 1.5
      setSelect: [0,0,900,600]
      onSelect: @update
      onChange: @update

  update: (coords)=>
    $('#photo_crop_x').val(coords.x)
    $('#photo_crop_y').val(coords.y)
    $('#photo_crop_w').val(coords.w)
    $('#photo_crop_h').val(coords.h)
    @updatePreview(coords)

  updatePreview: (coords) =>
    $('#preview').css
      width: Math.round(300/coords.w * $('#crop_box').width()) + 'px'
      height: Math.round(200/coords.h * $('#crop_box').height()) + 'px'
      marginLeft: '-' + Math.round(300/coords.w * coords.x) + 'px'
      marginTop: '-' + Math.round(200/coords.h * coords.y) + 'px'