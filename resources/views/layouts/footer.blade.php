<script src="{{ asset('js/app.js') }}"></script>

<script>
    /*
    * Show Custom Modal
    */
    function showModal(configModal) {
        var modalSize = ("size" in configModal) ? configModal.size : 'modal-xl';
        var modalBody = ("body" in configModal) ? configModal.body : '';
        var modalTitle = ("title" in configModal) ? configModal.title : '';

        $('.modal-dialog').addClass(modalSize);
        $('.modal-body').html(modalBody);
        $('.modal-title').html(modalTitle);


        $('#general-modal').modal({backdrop: 'static', keyboard: false});

    }

    /*
    *  Clone By Sample Class
     */
    function cloneHtml(sampleClass) {
        var targetElements = $('.' + sampleClass);

        var lastElements = targetElements.length

        targetElements.eq(lastElements - 1).after("<div class='row " + sampleClass + "'>" + targetElements.html() + "</div>");

        targetElements.eq(lastElements).find(['input[type=text]']).val('');

        targetElements.eq(lastElements).find('textarea').html('');

        targetElements.eq(lastElements).removeClass('hasDatepicker');

        targetElements.eq(lastElements).find(['select']).val('').trigger('change');

    }

    /*
    *  Delete Last Html Row
     */
    function deleteLastHtml(sampleClass) {
        targetElement = $('.' + sampleClass);
        if ($('.' + sampleClass).length > 1) {
            $(targetElement).eq($('.' + sampleClass).length - 1).remove();
        } else {
            errorAlert('این مورد قابل حذف نمی باشد !')
        }
    }


    function successAlert(message) {
        swal({
            title: "",
            text: message,
            icon: "success",
        });
    }

    function errorAlert(message) {
        swal({
            title: "",
            text: message,
            icon: "error",
        });
    }

    function httpGetRequest(url, loading = true, modalLoading = false) {
        if (loading) {
            setContentLoading();
        }

        if (modalLoading) {
            setModalLoading()
        }

        return $.get(url).fail(function (error) {
            removeModalLoading();
            removeContentLoading();
            errorAlert('خطای سمت سرور رخ داده لطفا با واحد پشتیبانی تماس بگیرید')
        })
    }

    function resetForm(submitButton) {
        submitButton.closest('form').find('.text-danger').remove();
    }

    function httpFormPostRequest(submitButton) {
        resetForm(submitButton);

        var data = new FormData($(submitButton).closest('form')[0])
        return $.ajax({
            data: data,
            processData: false,
            contentType: false,
            url: submitButton.closest('form').attr('action'),
            type: 'POST',
            document
        }).fail(function (xhr) {
            removeModalLoading();
            removeContentLoading();
            if (xhr.status == 422) {
                errorAlert('خطاهای فرم رو برطرف کنید');
                var errors = JSON.parse(xhr.responseText).errors
                showError(errors);
            }
        })
    }

    /*
    *  Post Ajax Request By Data
     */
    function httpPostRequest(url, data) {
        return $.post(url, data).fail(function (error) {
            removeModalLoading();
            removeContentLoading();
            errorAlert('خطای سمت سرور رخ داده لطفا با واحد پشتیبانی تماس بگیرید');
        })
    }

    function showError(errors) {
        $.each(errors, function (key, value) {
            var errArray = key.split('.');
            var htmlElement;

            if (typeof errArray[1] === 'undefined') {
                htmlElement = $("[name='" + key + "']");
                htmlElement.parent().after(createHtmlError(value))
            } else if ($.isNumeric(errArray[1])) {
                htmlElement = $("[name^='" + errArray[0] + "']");
                htmlElement.eq(errArray[1]).parent().after(createHtmlError(value));
            }
        })
    }

    function createHtmlError(descError, errorClass = 'text-danger') {
        return "<div class='" + errorClass + "'>" + descError + "</div>";
    }

    function setModalLoading() {
        var loadHtml = "<div class='overlay d-flex justify-content-center align-items-center'><i class='fas fa-2x fa-sync fa-spin'></i></div>"
        $('.modal-content').prepend(loadHtml)
    }

    function removeModalLoading() {
        $('.modal .overlay').remove();
        $('.overlay').remove();
    }

    function createSelect2() {
        setTimeout(function () {
            $('.select2').select2()
        }, 800);
    }

    function createSelect2Search(url, removeLast = true) {
        var countSelect2 = $('span.select2').length;
        setTimeout(function () {
            if (removeLast) {
                $('span.select2').eq(countSelect2 - 1).remove();
                $('select.select2').eq(countSelect2 - 1).removeClass('select2-hidden-accessible');
                $('select.select2').eq(countSelect2 - 1).html('');
            }

            $('.select2').select2({
                minimumInputLength: 2,
                ajax: {
                    url: url,
                    dataType: 'json',
                    type: "GET",
                    processResults: function (data) {
                        return {
                            results: data.data
                        };
                    }
                }
            })
        }, 500);
    }

    function setContentLoading() {
        var loadHtml = "<div class='overlay dark'><span class='text-warning'>" + "لطفا منتظر بمانید..." + "</span><i class='fas fa-2x fa-sync fa-spin'></i></div>";
        $('.card').prepend(loadHtml);
    }

    function removeContentLoading() {
        $('.overlay').remove();
    }

    scrollWith = 0;

    function customScroll(scrollClass = 'modal-body', withScroll = 300) {
        scrollWith = scrollWith + withScroll;
        $("." + scrollClass).animate({
            scrollTop: scrollWith
        });
    }


    /**
     * Set number format
     */
    $(document).on('keyup', '.number-format', function () {
        var elementKeyUp = $(this);
        elementKeyUp.val(numberFormat(elementKeyUp.val()))

    });

    /**
     * @param Number
     * @returns {string}
     */
    function numberFormat(Number) {
        Number += '';
        Number = Number.replace(',', '');
        Number = Number.replace(',', '');
        Number = Number.replace(',', '');
        Number = Number.replace(',', '');
        Number = Number.replace(',', '');
        Number = Number.replace(',', '');
        x = Number.split('.');
        y = x[0];
        z = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(y))
            y = y.replace(rgx, '$1' + ',' + '$2');
        return y + z;
    }

</script>
