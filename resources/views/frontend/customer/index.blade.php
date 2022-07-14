@extends('frontend.layouts.app')

@section('content')
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>User Report <small>Activity report</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="display: block;">
                    <div class="col-md-3 col-sm-3  profile_left">
                        <div class="profile_img">
                            <div id="crop-avatar">

                                <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar">
                            </div>
                        </div>
                        <h3>Samuel Doe</h3>
                        <ul class="list-unstyled user_data">
                            <li><i class="fa fa-map-marker user-profile-icon"></i> San Francisco, California, USA
                            </li>
                            <li>
                                <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
                            </li>
                            <li class="m-top-xs">
                                <i class="fa fa-external-link user-profile-icon"></i>
                                <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                            </li>
                        </ul>
                        <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                        <br>

                        <h4>Skills</h4>
                        <ul class="list-unstyled user_data">
                            <li>
                                <p>Web Applications</p>
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50" style="width: 50%;" aria-valuenow="50"></div>
                                </div>
                            </li>
                            <li>
                                <p>Website Design</p>
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70" style="width: 70%;" aria-valuenow="70"></div>
                                </div>
                            </li>
                            <li>
                                <p>Automation &amp; Testing</p>
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30" style="width: 30%;" aria-valuenow="30"></div>
                                </div>
                            </li>
                            <li>
                                <p>UI / UX</p>
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50" style="width: 50%;" aria-valuenow="50"></div>
                                </div>
                            </li>
                        </ul>

                    </div>
                    <div class="col-md-9 col-sm-9 ">
                        <div class="profile_title">
                            <div class="col-md-6">
                                <h2>User Activity Report</h2>
                            </div>
                            <div class="col-md-6">
                                <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                    <span>June 15, 2022 - July 14, 2022</span> <b class="caret"></b>
                                </div>
                            </div>
                        </div>

                        <div id="graph_bar" style="width: 100%; height: 280px; position: relative;"><svg height="280" version="1.1" width="826" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; top: -0.200012px;"><desc>Created with Raphaël @@VERSION</desc><defs></defs><text style="text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="43.5" y="213.97866332199317" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal"><tspan dy="3.9999951091025423">0</tspan></text><path style="" fill="none" stroke="#aaaaaa" d="M56,213.97866332199317H801" stroke-width="0.5"></path><text style="text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="43.5" y="166.73399749149488" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal"><tspan dy="4.000003961221438">750</tspan></text><path style="" fill="none" stroke="#aaaaaa" d="M56,166.73399749149488H801" stroke-width="0.5"></path><text style="text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="43.5" y="119.48933166099658" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal"><tspan dy="3.999997554551271">1,500</tspan></text><path style="" fill="none" stroke="#aaaaaa" d="M56,119.48933166099658H801" stroke-width="0.5"></path><text style="text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="43.5" y="72.24466583049829" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal"><tspan dy="3.9999987772756356">2,250</tspan></text><path style="" fill="none" stroke="#aaaaaa" d="M56,72.24466583049829H801" stroke-width="0.5"></path><text style="text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="43.5" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal"><tspan dy="4">3,000</tspan></text><path style="" fill="none" stroke="#aaaaaa" d="M56,25H801" stroke-width="0.5"></path><text style="text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="763.75" y="226.47866332199317" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-4.9072,493.173)"><tspan dy="3.9999951091025423">Other</tspan></text><text style="text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="689.25" y="226.47866332199317" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-39.6784,465.3545)"><tspan dy="3.9999951091025423">iPhone 6S Plus</tspan></text><text style="text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="614.75" y="226.47866332199317" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-42.2295,414.9754)"><tspan dy="3.9999951091025423">iPhone 6S</tspan></text><text style="text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="540.25" y="226.47866332199317" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-63.3481,377.5973)"><tspan dy="3.9999951091025423">iPhone 6 Plus</tspan></text><text style="text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="465.75" y="226.47866332199317" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-65.8992,327.2182)"><tspan dy="3.9999951091025423">iPhone 6</tspan></text><text style="text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="391.25" y="226.47866332199317" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-82.649,286.7811)"><tspan dy="3.9999951091025423">iPhone 5S</tspan></text><text style="text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="316.75" y="226.47866332199317" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-92.8456,241.7553)"><tspan dy="3.9999951091025423">iPhone 5</tspan></text><text style="text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="242.25" y="226.47866332199317" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-113.4181,203.9949)"><tspan dy="3.9999951091025423">iPhone 3GS</tspan></text><text style="text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="167.75" y="226.47866332199317" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-123.0685,158.5867)"><tspan dy="3.9999951091025423">iPhone 4S</tspan></text><text style="text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="93.25" y="226.47866332199317" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-133.2651,113.561)"><tspan dy="3.9999951091025423">iPhone 4</tspan></text><rect x="65.3125" y="190.04136596787404" width="55.875" height="23.937297354119124" rx="0" ry="0" fill="#26b99a" stroke="none" style="fill-opacity: 1;" fill-opacity="1"></rect><rect x="139.8125" y="172.71832183002465" width="55.875" height="41.26034149196852" rx="0" ry="0" fill="#26b99a" stroke="none" style="fill-opacity: 1;" fill-opacity="1"></rect><rect x="214.3125" y="196.6556191841438" width="55.875" height="17.323044137849365" rx="0" ry="0" fill="#26b99a" stroke="none" style="fill-opacity: 1;" fill-opacity="1"></rect><rect x="288.8125" y="115.01683662904274" width="55.875" height="98.96182669295042" rx="0" ry="0" fill="#26b99a" stroke="none" style="fill-opacity: 1;" fill-opacity="1"></rect><rect x="363.3125" y="172.71832183002465" width="55.875" height="41.26034149196852" rx="0" ry="0" fill="#26b99a" stroke="none" style="fill-opacity: 1;" fill-opacity="1"></rect><rect x="437.8125" y="78.29198305680208" width="55.875" height="135.6866802651911" rx="0" ry="0" fill="#26b99a" stroke="none" style="fill-opacity: 1;" fill-opacity="1"></rect><rect x="512.3125" y="141.91479970853976" width="55.875" height="72.0638636134534" rx="0" ry="0" fill="#26b99a" stroke="none" style="fill-opacity: 1;" fill-opacity="1"></rect><rect x="586.8125" y="64.62252640984457" width="55.875" height="149.3561369121486" rx="0" ry="0" fill="#26b99a" stroke="none" style="fill-opacity: 1;" fill-opacity="1"></rect><rect x="661.3125" y="121.31612540644251" width="55.875" height="92.66253791555066" rx="0" ry="0" fill="#26b99a" stroke="none" style="fill-opacity: 1;" fill-opacity="1"></rect><rect x="735.8125" y="127.61541418384229" width="55.875" height="86.36324913815088" rx="0" ry="0" fill="#26b99a" stroke="none" style="fill-opacity: 1;" fill-opacity="1"></rect></svg><div class="morris-hover morris-default-style" style="left: 259.75px; top: 110px; display: none;"><div class="morris-hover-row-label">iPhone 5</div><div class="morris-hover-point" style="color: #26B99A">
                                    Geekbench:
                                    1,571
                                </div></div></div>

                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true" class="active" aria-selected="true">Recent Activity</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false" class="" aria-selected="false">Projects Worked on</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false" class="" aria-selected="false">Profile</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="tab_content1" aria-labelledby="home-tab">

                                    <ul class="messages">
                                        <li>
                                            <img src="images/img.jpg" class="avatar" alt="Avatar">
                                            <div class="message_date">
                                                <h3 class="date text-info">24</h3>
                                                <p class="month">May</p>
                                            </div>
                                            <div class="message_wrapper">
                                                <h4 class="heading">Desmond Davison</h4>
                                                <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                                <br>
                                                <p class="url">
                                                    <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                                    <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <img src="images/img.jpg" class="avatar" alt="Avatar">
                                            <div class="message_date">
                                                <h3 class="date text-error">21</h3>
                                                <p class="month">May</p>
                                            </div>
                                            <div class="message_wrapper">
                                                <h4 class="heading">Brian Michaels</h4>
                                                <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                                <br>
                                                <p class="url">
                                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                                    <a href="#" data-original-title="">Download</a>
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <img src="images/img.jpg" class="avatar" alt="Avatar">
                                            <div class="message_date">
                                                <h3 class="date text-info">24</h3>
                                                <p class="month">May</p>
                                            </div>
                                            <div class="message_wrapper">
                                                <h4 class="heading">Desmond Davison</h4>
                                                <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                                <br>
                                                <p class="url">
                                                    <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                                    <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <img src="images/img.jpg" class="avatar" alt="Avatar">
                                            <div class="message_date">
                                                <h3 class="date text-error">21</h3>
                                                <p class="month">May</p>
                                            </div>
                                            <div class="message_wrapper">
                                                <h4 class="heading">Brian Michaels</h4>
                                                <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                                <br>
                                                <p class="url">
                                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                                    <a href="#" data-original-title="">Download</a>
                                                </p>
                                            </div>
                                        </li>
                                    </ul>

                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                                    <table class="data table table-striped no-margin">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Project Name</th>
                                            <th>Client Company</th>
                                            <th class="hidden-phone">Hours Spent</th>
                                            <th>Contribution</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>New Company Takeover Review</td>
                                            <td>Deveint Inc</td>
                                            <td class="hidden-phone">18</td>
                                            <td class="vertical-align-mid">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-success" data-transitiongoal="35" style="width: 35%;" aria-valuenow="35"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>New Partner Contracts Consultanci</td>
                                            <td>Deveint Inc</td>
                                            <td class="hidden-phone">13</td>
                                            <td class="vertical-align-mid">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-danger" data-transitiongoal="15" style="width: 15%;" aria-valuenow="15"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Partners and Inverstors report</td>
                                            <td>Deveint Inc</td>
                                            <td class="hidden-phone">30</td>
                                            <td class="vertical-align-mid">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-success" data-transitiongoal="45" style="width: 45%;" aria-valuenow="45"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>New Company Takeover Review</td>
                                            <td>Deveint Inc</td>
                                            <td class="hidden-phone">28</td>
                                            <td class="vertical-align-mid">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-success" data-transitiongoal="75" style="width: 75%;" aria-valuenow="75"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                    <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                                        photo booth letterpress, commodo enim craft beer mlkshk </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
