
function showArticles () {

    $('.article').each(function (index) {
        $(this).delay(index*400).animate({ opacity: 1 })
    })
}

showArticles();