<?php
$url_host = $_SERVER['HTTP_HOST'];

$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');

$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);

$url_path = $url_host . $matches[1][0];

$url_path = str_replace('\\', '/', $url_path);
?>


<div class="type-3027">
    <div class="container">

        <h1>Make An Appoinment</h1>
        <span class="border-h1"></span>
        <div class="content">
            <form action="" method="post" class="form-content" novalidate="novalidate">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-box">
                            <input type="text" name="name" class="name" placeholder="Name*">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-box">
                            <input type="email" name="email" class="email" placeholder="Email*">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-box">
                            <input type="text" name="phone" class="phone" placeholder="Phone*">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-box">
                            <input type="text" name="date" class="date" placeholder="Date">
                            <div class="icon-box">
                                <i class="fa-regular fa-calendar-days"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-box">
                            <input type="text" name="time" class="time" placeholder="Time">
                            <div class="icon-box">
                                <i class="fa-regular fa-clock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-box">
                            <select name="service" id="">
                                <option value="Select Service">Select Service</option>
                                <option value="Select Service one">Select Service one</option>
                                <option value="Select Service Two">Select Service Two</option>
                                <option value="Select Service Three">Select Service Three</option>
                            </select>
                            <div class="icon-box">

                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-box">
                            <textarea name="messages" class="message " id="" placeholder="Message..."></textarea>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-md-12">
                    <input type="submit" value="SEND NOW" class="sendnow">
                </div>
            </div>
        </div>

    </div>
</div>