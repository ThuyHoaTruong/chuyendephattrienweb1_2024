<?php
$url_host = $_SERVER['HTTP_HOST'];

$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');

$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);

$url_path = $url_host . $matches[1][0];

$url_path = str_replace('\\', '/', $url_path);
?>

<div class="type-3011">
    <div class="main1">
        <div class="main1_title">
            <h1>About us</h1>
            <h4>Reliable Phone Repair Services, Guaranteed to Meet Expectations</h4>
        </div>
    </div>
    <div class="main2">
        <div class="content">
            <div class="content1">
                <h6>WHO WE ARE</h6>
                <h2>Get It Fixed Fast with MobiCare's Expert Technicians</h2>
                <p>Eros venenatis praesent litora pretium ullamcorper. Leo consequat enim ultricies facilisis curabitur maximus nullam <br> fusce. Cursus blandit adipiscing.</p>
                <a href="#">Learn more</a>
            </div>
            <div class="content2">
                <!-- <img src="images/smartphone_img.png" alt=""> -->
            </div>
            <div class="content3">
                <div class="item">
                    <div class="icon-item">
                        <i class="bi bi-rocket-takeoff"></i> <!-- Bootstrap Icon -->
                    </div>
                    <div class="text-item">
                        <h3>Fast Turnaround Time</h3>
                        <p>Consequeter justo semper tortor tempus morbi leo cras.</p>
                    </div>
                </div>
                <div class="item">
                    <div class="icon-item">
                        <i class="bi bi-globe"></i> <!-- Bootstrap Icon -->
                    </div>
                    <div class="text-item">
                        <h3>Comprehensive Warranty</h3>
                        <p>Consequeter justo semper tortor tempus morbi leo cras.</p>
                    </div>
                </div>
                <div class="item">
                    <div class="icon-item">
                    <i class="bi bi-chat-square-text"></i> <!-- Bootstrap Icon -->
                    </div>
                    <div class="text-item">
                        <h3>Customer-Centric Support</h3>
                        <p>Consequeter justo semper tortor tempus morbi leo cras.</p>
                    </div>
                </div>

            </div>
        </div>
        <div class="bg"></div>
    </div>
</div>