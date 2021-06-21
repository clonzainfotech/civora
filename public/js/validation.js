 function createvalidation() {
            document.getElementById('error_name').innerHTML="";
            document.getElementById('error_mobile').innerHTML="";
            document.getElementById('error_email').innerHTML="";
            document.getElementById('error_password').innerHTML="";
            document.getElementById('error_role').innerHTML="";
            document.getElementById('error_status').innerHTML="";

            var name=document.getElementById('name').value;
            var mobile=document.getElementById('mobile').value;
            var email=document.getElementById('email').value;
            var password=document.getElementById('password').value;
            var role=document.getElementById('role').value;
            var status=document.getElementById('status').value;
            var filter = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var i =0;

            if (name == "") {
                  document.getElementById('error_name').innerHTML="  Please enter you  name  ";
                  i= 1;
            }
            if (mobile.length != 10) {
             document.getElementById('error_mobile').innerHTML="  please enter you  mobile number  must be 10 digit";
             i= 1;
         }
            if (email== "") {
             document.getElementById('error_email').innerHTML="  Please enter your email";
             i= 1;
         }
          if (!email.match(filter)) {
             document.getElementById('error_email').innerHTML="  Please enter valid email address email";
             i= 1;
         }
            if (password== "") {
             document.getElementById('error_password').innerHTML="  Please enter your password";
             i= 1;
         }
            if (role=="") {
             document.getElementById('error_role').innerHTML="  Please select your role";
             i= 1;
         }
            if (status=="") {
             document.getElementById('error_status').innerHTML="  Please select your status";
             i= 1;
         }

         if(i==1)
         {
            return false;
         }
         return true;
        }




        var roleValue = '';

         $(document).ready(function () {
            $('.doctor-fields').addClass('d-none');
            $(document).on('change','select.user-roles',function(){
                roleValue = $(this).val();
                $('.doctor-fields').addClass('d-none');
                if(roleValue == 3) {
                    $('.doctor-fields').removeClass('d-none');
                }
            });

            // $(document).on('click','.add-achievement',function(){
            //     $('.achievement-error').text('');
            //     var dId = $(this).data('id');
            //     var imageData = $('.achievement-f').map(function() {
            //         if(this.value != ''){
            //             return this.value;
            //         }
            //     }).get();
            //         var valueData = imageData.length;
            //         var totalFile = $('.achievement-f').length;
            //         $('.achievement-error').text('');
            //         if(valueData < totalFile){
            //             $('.achievement-error').text('Please fill up achievement');
            //             return false;
            //         }
            //     doctorData(dId + 1);
            // });
        });

        // doctor data
        // function doctorData(i){
        //     var doctorData = "<div class='col-md-5 doctor-fields'>"+
        //                         "<div class='form-group'>"+
        //                             "<input type='file' name='achievement["+i+"][file]' class='form-control achievement-f achievement-file-"+i+"'>"+
        //                         "</div>"+
        //                     "</div>";
        //     $('.doctor-data').append(doctorData);
        //     $('.add-achievement').data('id',i);
        // }

        



    function edituser() {
            $('.user_error').text('');
            var name = $('.name').val();
            var mobile = $('.mobile').val();
            var role = $(".user-roles option:selected").val();
            var status= $(".status option:selected").val();
            var achievement = $('.achievement').val();
            var degree = $('.degree').val();
            var specialist = $('.specialist').val();
            var description = $('.description').val();
            var loggedInUser = $('#logged_in_user').val();
            var dateOfBirth = $('.dob_date').val();
            var i = 0;


            if (name == "") {
                $('.name').text('please Enter Your  Name');
                i= 1;
            }
            if (mobile.length != 10) {
                $('.mobile_number').text('please Enter your  mobile number  must be 10 digit');
                i= 1;
            }

            if (loggedInUser == 1) {
                if (role=="") {
                    $('.role').text('please select your role');
                    i= 1;
                }
                if (dateOfBirth=="") {
                    $('.dob_date').text('please enter date of birth');
                    i= 1;
                }
            }


            if (role == 3) {
                if (degree == '') {
                    $('.degree').text('please enter your degrees');
                    i= 1;
                }
                if (specialist == '') {
                    $('.specialist').text('please enter your speciality');
                    i= 1;
                }
                if (description == '') {
                    $('.descriptions').text('please enter your description');
                    i= 1;
                }
            }

            if(i == 1) {
                return false;
            }

            return true;
        }