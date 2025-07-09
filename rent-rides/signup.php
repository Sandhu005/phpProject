<?php
include("header.php");
?>
<div class="container-fluid py-5">
    <div class="row justify-content-center">
        <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="bg-secondary p-5 rounded">
                <h4 class="text-primary mb-4">Send Your Message</h4>
                <form>
                    <div class="row g-4">
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" placeholder="Your Name">
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" placeholder="Your Email">
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <input type="phone" class="form-control" id="phone" placeholder="Phone">
                                <label for="phone">Your Phone</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="project" placeholder="Project">
                                <label for="project">Your Project</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="subject" placeholder="Subject">
                                <label for="subject">Subject</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 160px"></textarea>
                                <label for="message">Message</label>
                            </div>

                        </div>
                        <div class="col-12">
                            <button class="btn btn-light w-100 py-3">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include("footer.php");
?>