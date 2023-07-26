/** Repeater fields */
if ($(".repeater-input").length) {
    $('.repeater-input').each(function (index, element) {
        let count_item = $(this).find('.repeater-input__item');
        if (count_item.length > 1) {
            $(this).addClass('repeater-input--fields')
        }
        else {
            $(this).removeClass('repeater-input--fields')
        }
    });
}

$(".repeater-input").on("click", ".repeater-input__item--add", function (e) {
    e.preventDefault()
    let parent_wrap = $(this).closest('.repeater-input'),
        parent_item = $(this).closest('.repeater-input__item'),
        clone_item = parent_item.clone();

    clone_item.find('input').val('')
    clone_item.find('select option').prop('selected', false);
    clone_item.find('select option:first').prop('selected', true);
    parent_wrap.append(clone_item)
    parent_wrap.addClass('repeater-input--fields')
})

$(".repeater-input").on("click", ".repeater-input__item--remove", function (e) {
    e.preventDefault()
    let parent_wrap = $(this).closest('.repeater-input');
    $(this).closest('.repeater-input__item').remove()

    let count_item = parent_wrap.find('.repeater-input__item');
    if (count_item.length > 1) {
        parent_wrap.addClass('repeater-input--fields')
    }
    else {
        parent_wrap.removeClass('repeater-input--fields')
    }
})
/** End repeater fields */