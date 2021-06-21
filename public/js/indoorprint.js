$(document).ready(function () {

    var patientId = '';
    $(document).on('click', '.admistion-consent', function (e) {
        patientId = $(this).data('id');
        patientId = patientId + '&isprint=1';
        printAdmitionConsent(patientId);
    });

    $(document).on('click', '.fetal-reducation', function () {
        var data = [];
        data['patient_id'] = $(this).data('id');
        data['report'] = 'fetal-reducation';
        previewData(data);
    });

    $(document).on('click', '.tl-recanalisation', function () {
        var data = [];
        data['patient_id'] = $(this).data('id');
        data['report'] = 'tl-recanalisation';
        previewData(data);
    });

    function previewData(data) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: './get-patient-report-data',
            dataType: 'json',
            type: 'POST',
            data: {
                patient_id: data.patient_id,
                report: data.report
            },
        }).done(function (data) {
            if (data.status == true) {
                w = window.open(window.location.href, '_blank');
                w.document.open();
                w.document.write(data.data);
                w.document.close();
                setTimeout(function () {
                    w.window.print();
                }, 250);
            } else {
                location.reload();
            }
        }).fail(function (error) {

        });
    }

    function printAdmitionConsent(patientId) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "indoor/print-admintion-consent/" + patientId,
            dataType: 'json',
            type: 'POST',
            data: patientId
        }).done(function (data) {
            if (data.status == 1) {
                w = window.open(window.location.href, "_blank");
                w.document.open();
                w.document.write(data.data);
                w.document.close();
                setTimeout(function () {
                    w.window.print();
                }, 300);
            } else {
                // location.reload();
            }
        }).fail(function (error) {
            $('.form-error-msg').text('');
            if (error.responseJSON != null) {
                var formError = error.responseJSON.errors;
                $.each(formError, function (key, value) {
                    $('.' + key).text(value);
                });
            }
        });
    }

});
