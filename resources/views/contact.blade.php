@extends('layouts.main')

@section('title')
Contact Me
@endsection

@section('content')
    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-100">

                <div class="row">
                    <div class="col-12">
                        <!-- Contact Form Area -->
                        <div class="contact-form-area  wow fadeInUp" data-wow-delay="200ms">
                            <form id="contactform">
                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="from" placeholder="E-mail" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Message" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button class="btn oneMusic-btn mt-30" type="submit">Send <i class="fa fa-angle-double-right"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ##### Contact Area End ##### -->


        <script>

                $('#contactform').submit((e)=>{
                 e.preventDefault();
                 $("#loading").show()
                 let data = $('#contactform').serialize();
                 $.ajax({
                     type: 'POST',
                     data: data,
                     url: '{{url('/api/sendmail')}}',
                     success: (response)=>{
                        $('#contactform').trigger('reset');
                     $("#loading").hide()
                     toastr.success('I will get back to you shortly', 'Message sent!')
                     },
                     error: (error)=>{
                        let errors = error.responseJSON.errors;
                         $("#loading").hide()
                         $.each(errors, (key, value)=>{
                            window.msgs = value
                         });
                         toastr.error(window.msgs, 'Message not sent')
                         toastr.error('Could not connect', 'Message not sent')
                     }
                 })
                 //End of ajax
                 //End of form submit
                 })
                 </script>
@endsection
