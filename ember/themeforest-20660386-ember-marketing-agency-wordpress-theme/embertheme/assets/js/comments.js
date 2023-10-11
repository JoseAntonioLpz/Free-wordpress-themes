jQuery(function ($) {
    $('#commentform').submit(function (e) {
        e.preventDefault();

        var btnLoad = emberComments.loading + '<i class="fa fa-spinner fa-pulse  fa-fw"></i>';
        var btnSend = emberComments.send;

        if (!$('#submit').hasClass('loadingform') && !$("#author").hasClass('error') && !$("#email").hasClass('error') && !$("#comment").hasClass('error')) {


            $.ajax({
                type: 'POST',
                url: emberComments.ajax_url,
                data: $(this).serialize() + '&action=differ_comments' + '&nonce_code=' + emberComments.nonce + '',
                beforeSend: function (xhr) {
                    $('#commentform button[type="submit"]').addClass('loadingform').html(btnLoad);

                },
                error: function (request, status, error) {
                    if (status == 500) {
                        alert('Error');
                    } else if (status == 'timeout') {
                        alert('Error: Server does not respond, try again.');
                    } else {
                        var errormsg = request.responseText;


                    }
                },
                success: function (newComment) {
                    if ($('.comment-list').length > 0) {
                        if ($('#respond').parent().hasClass('comment')) {
                            if ($('#respond').parent().children('.children').length) {
                                if (/<div/.test(newComment)) {
                                    $(newComment).appendTo($('#respond').parent().children('.children')).hide().fadeIn(300);
                                }
                                else {
                                    var error = '<p class="comment-item wp-error">' + newComment + '</p>'
                                    $(error).appendTo($('#respond').parent().children('.children')).hide().fadeIn(300);
                                }

                            } else {
                                newComment = '<ul class="children">' + newComment + '</ul>';
                                $(newComment).appendTo($('#respond').parent()).hide().fadeIn(300);
                            }
                            $("#cancel-comment-reply-link").trigger("click");
                        } else {
                            if (/<div/.test(newComment)) {
                                $(newComment).appendTo('.comment-list').hide().fadeIn(250);
                            }
                            else {
                                var error = '<p class="comment-item wp-error">' + newComment + '</p>'
                                $(error).appendTo('.comment-list').hide().fadeIn(250);
                            }
                        }
                    } else {
                        newComment = '<ol class="comment-list">' + newComment + '</ol>';
                        $('#respond').before($(newComment));
                    }
                    $('#comment').val('');


                    // Comments Counter ++
                    let Counter = $(".comments-counter");
                    if (Counter.length) {
                        let commentsCount = Number(Counter.text());
                        Counter.text(++commentsCount + " ");
                    }


                },
                complete: function () {
                    $('#commentform button[type="submit"]').removeClass('loadingform').html(btnSend);
                }
            });
        }
        return false;
    });
});