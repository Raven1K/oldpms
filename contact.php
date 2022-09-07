<section id="contactus" class="py-2">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-6">

                <div class="alert alert-success d-none" id="contactSuccess">
                    <strong>Success!</strong> Your message has been sent to us.
                </div>

                <div class="alert alert-danger d-none" id="contactError">
                    <strong>Error!</strong> There was an error sending your message.
                </div>

                <h2 class="mb-2"><strong>Contact Us</strong></h2>
                <form id="contactForm" action="/ContactForm" method="POST">
                    <div class="form-row">
                        <div class="form-group col-lg-6 mt-3">
                            <label>Your name *</label>
                            <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="form-group col-lg-6 mt-3">
                            <label>Your email address *</label>
                            <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col mt-3">
                            <label>Subject</label>
                            <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col mt-3">
                            <label>Message *</label>
                            <textarea maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control" name="message" id="message" required></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col mt-3">
                            <input type="submit" value="Send Message" class="btn btn-primary btn-lg mt-3 mb-4" data-loading-text="Loading...">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6">

                <h4 class="heading-primary"><strong>RICTU DENR Caraga</strong></h4>
                <ul class="list list-icons list-icons-style-3 mt-4">
                    <li><i class="fas fa-map-marker-alt"></i> <strong>Address:</strong> Ambago, Butuan City, Philippines, 8600</li>
                    <li><i class="fas fa-phone"></i> <strong>Phone:</strong> (085) 815 – 2277</li>
                    <li><i class="far fa-envelope"></i> <strong>Email:</strong> <a href="mailto:caraga.ict@denr.gov.ph">caraga.ict@denr.gov.ph</a></li>
                </ul>

            </div>

        </div>
    </div>
</section>